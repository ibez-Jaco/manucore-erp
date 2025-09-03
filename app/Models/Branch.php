<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @property int                 $id
 * @property int                 $company_id
 * @property string              $code
 * @property string              $name
 * @property string|null         $type
 * @property string|null         $email
 * @property string|null         $phone
 * @property string|null         $mobile
 * @property string|null         $fax
 * @property string|null         $address_line_1
 * @property string|null         $address_line_2
 * @property string|null         $city
 * @property string|null         $state_province
 * @property string|null         $postal_code
 * @property string|null         $country
 * @property float|null          $latitude
 * @property float|null          $longitude
 * @property int|null            $manager_id
 * @property array|null          $operating_hours
 * @property string|null         $timezone
 * @property bool                $use_company_banking
 * @property string|null         $bank_name
 * @property string|null         $bank_branch
 * @property string|null         $bank_branch_code
 * @property string|null         $bank_account_name
 * @property string|null         $bank_account_number
 * @property string|null         $bank_account_type
 * @property bool                $is_active
 * @property bool                $is_head_office
 * @property bool                $can_sell
 * @property bool                $can_purchase
 * @property bool                $holds_inventory
 * @property string|null         $invoice_prefix
 * @property string|null         $quote_prefix
 * @property string|null         $order_prefix
 * @property string|null         $credit_note_prefix
 * @property int|null            $created_by
 * @property int|null            $updated_by
 *
 * @property-read Company        $company
 * @property-read User|null      $manager
 * @property-read \Illuminate\Database\Eloquent\Collection<User> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<User> $accessibleByUsers
 */
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
        'operating_hours'     => 'array',
        'latitude'            => 'decimal:8',
        'longitude'           => 'decimal:8',
        'use_company_banking' => 'boolean',
        'is_active'           => 'boolean',
        'is_head_office'      => 'boolean',
        'can_sell'            => 'boolean',
        'can_purchase'        => 'boolean',
        'holds_inventory'     => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Model Events
    |--------------------------------------------------------------------------
    */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Branch $branch): void {
            if (empty($branch->code)) {
                $branch->code = static::generateBranchCode((int)$branch->company_id);
            }
            $branch->created_by = Auth::id();
        });

        static::updating(function (Branch $branch): void {
            $branch->updated_by = Auth::id();
        });
    }

    public static function generateBranchCode(int $companyId): string
    {
        $prefix = 'BR';
        $last = static::withTrashed()
            ->where('company_id', $companyId)
            ->where('code', 'like', $prefix.'%')
            ->orderBy('code', 'desc')
            ->first();

        $n = 1;
        if ($last && is_string($last->code)) {
            $suffix = substr($last->code, strlen($prefix));
            $n = (int)$suffix + 1;
        }

        return $prefix . str_pad((string)$n, 3, '0', STR_PAD_LEFT);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /** Users whose primary branch is this branch (users.branch_id FK). */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /** Extra branch access via user_branch_access pivot. */
    public function accessibleByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_branch_access')
            ->withPivot('is_primary')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors / Helpers
    |--------------------------------------------------------------------------
    */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address_line_1,
            $this->address_line_2,
            $this->city,
            $this->state_province,
            $this->postal_code,
            $this->country,
        ], fn ($v) => filled($v));

        return implode(', ', $parts);
    }

    /**
     * Banking details taking into account the "use_company_banking" flag.
     * Does not assume a Company accessor; falls back to raw columns.
     */
    public function getBankingDetailsAttribute(): array
    {
        if ($this->use_company_banking && $this->company) {
            return [
                'bank'           => $this->company->bank_name         ?? null,
                'branch'         => $this->company->bank_branch       ?? null,
                'branch_code'    => $this->company->bank_branch_code  ?? null,
                'account_name'   => $this->company->bank_account_name ?? null,
                'account_number' => $this->company->bank_account_number ?? null,
                'account_type'   => $this->company->bank_account_type ?? null,
            ];
        }

        return [
            'bank'           => $this->bank_name,
            'branch'         => $this->bank_branch,
            'branch_code'    => $this->bank_branch_code,
            'account_name'   => $this->bank_account_name,
            'account_number' => $this->bank_account_number,
            'account_type'   => $this->bank_account_type,
        ];
    }

    public function getEffectiveTimezoneAttribute(): string
    {
        return $this->timezone
            ?: ($this->company->timezone ?? 'Africa/Johannesburg');
    }

    public function isOpenNow(): bool
    {
        // If no hours configured, treat as open (fail-safe).
        if (empty($this->operating_hours) || !is_array($this->operating_hours)) {
            return true;
        }

        $now = now()->setTimezone($this->getEffectiveTimezoneAttribute());
        $day = strtolower($now->format('l'));
        $hours = $this->operating_hours[$day] ?? null;

        if (!$hours || !($hours['is_open'] ?? false)) {
            return false;
        }

        $t = $now->format('H:i');
        $open  = $hours['open']  ?? '00:00';
        $close = $hours['close'] ?? '23:59';

        return $t >= $open && $t <= $close;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActive($q)      { return $q->where('is_active', true); }
    public function scopeCanSell($q)     { return $q->where('can_sell', true); }
    public function scopeCanPurchase($q) { return $q->where('can_purchase', true); }
    public function scopeWarehouses($q)  { return $q->where('holds_inventory', true); }
}
