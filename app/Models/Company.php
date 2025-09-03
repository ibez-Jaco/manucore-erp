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

        // Physical
        'address_line_1','address_line_2','city','state_province','postal_code','country',

        // Postal
        'postal_address_line_1','postal_address_line_2','postal_city','postal_state_province','postal_postal_code','postal_country',

        // Banking
        'bank_name','bank_branch','bank_branch_code','bank_account_name','bank_account_number','bank_account_type','bank_swift_code','bank_iban','bank_reference',

        // Finance
        'currency_code','currency_symbol','vat_rate','vat_type','financial_year_end','is_vat_registered','default_tax_rate',

        // Branding (paths; ML used elsewhere)
        'logo_full_color','logo_white','logo_black','logo_icon','favicon',

        // Theme
        'theme','primary_color','secondary_color','accent_color','gradient_start','gradient_end',

        // Email content defaults
        'email_from_name','email_from_address','email_reply_to','email_signature','email_footer','invoice_terms','quote_terms',

        // System
        'timezone','date_format','time_format','is_active','is_main',

        // Mail server (per-company)
        'mail_mailer','mail_host','mail_port','mail_username','mail_password','mail_encryption',

        // Database connection (per-company)
        'db_host','db_port','db_database','db_username','db_password',

        'created_by','updated_by',
    ];

    protected $casts = [
        'vat_rate'         => 'decimal:2',
        'default_tax_rate' => 'decimal:2',
        'is_vat_registered'=> 'boolean',
        'is_active'        => 'boolean',
        'is_main'          => 'boolean',
        'mail_port'        => 'integer',
        'db_port'          => 'integer',

        // Laravel encrypted casting (keeps at-rest encryption)
        'mail_password'    => 'encrypted',
        'db_password'      => 'encrypted',
    ];

    protected static function boot(): void
    {
        parent::boot();

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
            ->where('code', 'like', $prefix.'%')
            ->orderBy('code', 'desc')
            ->first();

        $n = $last ? ((int) substr($last->code, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad((string) $n, 4, '0', STR_PAD_LEFT);
    }

    /* Media Library */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo-full-color')->singleFile()->acceptsMimeTypes(['image/png','image/jpeg','image/svg+xml']);
        $this->addMediaCollection('logo-white')->singleFile()->acceptsMimeTypes(['image/png','image/svg+xml']);
        $this->addMediaCollection('logo-black')->singleFile()->acceptsMimeTypes(['image/png','image/svg+xml']);
        $this->addMediaCollection('logo-icon')->singleFile()->acceptsMimeTypes(['image/png','image/jpeg','image/svg+xml']);
        $this->addMediaCollection('favicon')->singleFile()->acceptsMimeTypes(['image/x-icon','image/png','image/svg+xml']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(150)->height(150)->sharpen(10);
        $this->addMediaConversion('preview')->width(500)->height(500);
    }

    /* Relations */
    public function branches(): HasMany { return $this->hasMany(Branch::class); }
    public function users(): HasMany    { return $this->hasMany(User::class);   }

    /* Helpers */
    public function headOffice() { return $this->branches()->where('is_head_office', true)->first(); }

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

    /** Fallback: if default_tax_rate is null, use legacy vat_rate */
    public function getDefaultTaxRateAttribute($value): ?string
    {
        if (!is_null($value)) return $value;
        return $this->attributes['vat_rate'] ?? null;
    }

    public function getBankingDetailsAttribute(): array
    {
        return [
            'bank'          => $this->bank_name,
            'branch'        => $this->bank_branch,
            'branch_code'   => $this->bank_branch_code,
            'account_name'  => $this->bank_account_name,
            'account_number'=> $this->bank_account_number,
            'account_type'  => $this->bank_account_type,
            'swift'         => $this->bank_swift_code,
            'iban'          => $this->bank_iban,
            'reference'     => $this->bank_reference,
        ];
    }

    /* Scopes & helpers */
    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeMain($q)   { return $q->where('is_main', true); }
    public static function getMain(){ return static::active()->main()->first(); }

    public function themeIsCustom(): bool { return $this->theme === 'custom'; }

    public function hasPostalAddress(): bool
    {
        return filled($this->postal_address_line_1)
            || filled($this->postal_address_line_2)
            || filled($this->postal_city)
            || filled($this->postal_state_province)
            || filled($this->postal_postal_code)
            || filled($this->postal_country);
    }

    /* Quick config helpers (useful for per-company mail/db switching) */
    public function mailConfig(): array
    {
        // Intentionally excludes passwords when array is logged
        return array_filter([
            'transport' => $this->mail_mailer,
            'host'      => $this->mail_host,
            'port'      => $this->mail_port,
            'username'  => $this->mail_username,
            // 'password' => $this->mail_password, // use carefully
            'encryption'=> $this->mail_encryption,
            'from'      => [
                'address' => $this->email_from_address,
                'name'    => $this->email_from_name,
            ],
            'reply_to'  => $this->email_reply_to,
        ], fn($v) => !is_null($v) && $v !== '');
    }

    public function databaseConfig(): array
    {
        return array_filter([
            'driver'   => 'mysql',
            'host'     => $this->db_host,
            'port'     => $this->db_port,
            'database' => $this->db_database,
            'username' => $this->db_username,
            // 'password' => $this->db_password, // use carefully
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict'    => true,
            'engine'    => null,
        ], fn($v) => !is_null($v) && $v !== '');
    }
}
