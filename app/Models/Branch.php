<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id','code','name','type',
        'email','phone','mobile','fax',
        'address_line_1','address_line_2','city','state_province','postal_code','country',
        'latitude','longitude',
        'manager_id','operating_hours','timezone',
        'use_company_banking','bank_name','bank_branch','bank_branch_code','bank_account_name','bank_account_number','bank_account_type',
        'is_active','is_head_office','can_sell','can_purchase','holds_inventory',
        'invoice_prefix','quote_prefix','order_prefix','credit_note_prefix',
        'created_by','updated_by',
    ];

    protected $casts = [
        'operating_hours' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'use_company_banking' => 'boolean',
        'is_active' => 'boolean',
        'is_head_office' => 'boolean',
        'can_sell' => 'boolean',
        'can_purchase' => 'boolean',
        'holds_inventory' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Branch $branch): void {
            if (empty($branch->code)) {
                $branch->code = static::generateBranchCode($branch->company_id);
            }
            $branch->created_by = Auth::id();
        });

        static::updating(function (Branch $branch): void {
            $branch->updated_by = Auth::id();
        });
    }

    public static function generateBranchCode($companyId): string
    {
        $prefix = 'BR';
        $last = static::withTrashed()
            ->where('company_id', $companyId)
            ->where('code', 'like', $prefix . '%')
            ->orderBy('code', 'desc')
            ->first();

        $n = $last ? ((int) substr($last->code, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad((string) $n, 3, '0', STR_PAD_LEFT);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function accessibleByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_branch_access')
            ->withPivot('is_primary')
            ->withTimestamps();
    }

    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address_line_1,
            $this->address_line_2,
            $this->city,
            $this->state_province,
            $this->postal_code,
            $this->country,
        ]);

        return implode(', ', $parts);
    }

    public function getBankingDetailsAttribute(): array
    {
        if ($this->use_company_banking && $this->company) {
            return $this->company->banking_details;
        }

        return [
            'bank' => $this->bank_name,
            'branch' => $this->bank_branch,
            'branch_code' => $this->bank_branch_code,
            'account_name' => $this->bank_account_name,
            'account_number' => $this->bank_account_number,
            'account_type' => $this->bank_account_type,
        ];
    }

    public function getEffectiveTimezoneAttribute(): string
    {
        return $this->timezone ?: ($this->company ? $this->company->timezone : 'Africa/Johannesburg');
    }

    public function isOpenNow(): bool
    {
        if (!$this->operating_hours) {
            return true; // assume open if hours not configured
        }

        // Use explicit accessor call to avoid analyzer warnings on magic attrs
        $now = now()->setTimezone($this->getEffectiveTimezoneAttribute());
        $day = strtolower($now->format('l'));

        if (!isset($this->operating_hours[$day])) {
            return false;
        }

        $hours = $this->operating_hours[$day];
        if (!($hours['is_open'] ?? false)) {
            return false;
        }

        $t = $now->format('H:i');
        return $t >= ($hours['open'] ?? '00:00') && $t <= ($hours['close'] ?? '23:59');
    }

    public function scopeActive($q)      { return $q->where('is_active', true); }
    public function scopeCanSell($q)     { return $q->where('can_sell', true); }
    public function scopeCanPurchase($q) { return $q->where('can_purchase', true); }
    public function scopeWarehouses($q)  { return $q->where('holds_inventory', true); }
}
