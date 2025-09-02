<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'code','name','legal_name','registration_number','vat_number',
        'email','phone','mobile','fax','website',
        'address_line_1','address_line_2','city','state_province','postal_code','country',
        'postal_address_line_1','postal_address_line_2','postal_city','postal_state_province','postal_postal_code','postal_country',
        'bank_name','bank_branch','bank_branch_code','bank_account_name','bank_account_number','bank_account_type','bank_swift_code','bank_iban','bank_reference',
        'currency_code','currency_symbol','vat_rate','vat_type','financial_year_end','is_vat_registered',
        'logo_full_color','logo_white','logo_black','logo_icon','favicon',
        'theme','primary_color','secondary_color','accent_color','gradient_start','gradient_end',
        'email_from_name','email_from_address','email_reply_to','email_signature','email_footer',
        'invoice_terms','quote_terms',
        'timezone','date_format','time_format','is_active','is_main',
        'created_by','updated_by',
    ];

    protected $casts = [
        'vat_rate' => 'decimal:2',
        'is_vat_registered' => 'boolean',
        'is_active' => 'boolean',
        'is_main' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        // Type-hint the model param and use Auth::id() for analyzer-friendly code
        static::creating(function (Company $company): void {
            if (empty($company->code)) {
                $company->code = static::generateCompanyCode();
            }
            $company->created_by = Auth::id();
        });

        static::updating(function (Company $company): void {
            $company->updated_by = Auth::id();
        });
    }

    public static function generateCompanyCode(): string
    {
        $prefix = 'CO';
        $last = static::withTrashed()
            ->where('code', 'like', $prefix . '%')
            ->orderBy('code', 'desc')
            ->first();

        $n = $last ? ((int) substr($last->code, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad((string) $n, 4, '0', STR_PAD_LEFT);
    }

    // Media Library collections for branding
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo-full-color')->singleFile()->acceptsMimeTypes(['image/png','image/jpeg','image/svg+xml']);
        $this->addMediaCollection('logo-white')->singleFile()->acceptsMimeTypes(['image/png','image/svg+xml']);
        $this->addMediaCollection('logo-black')->singleFile()->acceptsMimeTypes(['image/png','image/svg+xml']);
        $this->addMediaCollection('logo-icon')->singleFile()->acceptsMimeTypes(['image/png','image/jpeg','image/svg+xml']);
        $this->addMediaCollection('favicon')->singleFile()->acceptsMimeTypes(['image/x-icon','image/png','image/svg+xml']);
    }

    // NOTE: make parameter explicitly nullable to satisfy PHP 8.2+ deprecation
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(150)->height(150)->sharpen(10);
        $this->addMediaConversion('preview')->width(500)->height(500);
    }

    // Relations
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Helpers
    public function headOffice()
    {
        return $this->branches()->where('is_head_office', true)->first();
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

    public function getFullPostalAddressAttribute(): string
    {
        $parts = array_filter([
            $this->postal_address_line_1 ?: $this->address_line_1,
            $this->postal_address_line_2 ?: $this->address_line_2,
            $this->postal_city ?: $this->city,
            $this->postal_state_province ?: $this->state_province,
            $this->postal_postal_code ?: $this->postal_code,
            $this->postal_country ?: $this->country,
        ]);

        return implode(', ', $parts);
    }

    public function getBankingDetailsAttribute(): array
    {
        return [
            'bank' => $this->bank_name,
            'branch' => $this->bank_branch,
            'branch_code' => $this->bank_branch_code,
            'account_name' => $this->bank_account_name,
            'account_number' => $this->bank_account_number,
            'account_type' => $this->bank_account_type,
            'swift' => $this->bank_swift_code,
            'iban' => $this->bank_iban,
            'reference' => $this->bank_reference,
        ];
    }

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeMain($q)   { return $q->where('is_main', true); }
    public static function getMain(){ return static::active()->main()->first(); }

    // Hybrid theme helpers (used later in middleware/UI)
    public function themeIsCustom(): bool
    {
        return $this->theme === 'custom';
    }
}
