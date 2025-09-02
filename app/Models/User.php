<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name','email','password',
        'company_id','branch_id',
        'employee_code','department','job_title',
        'phone','mobile','can_access_all_branches','joined_date',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'can_access_all_branches' => 'boolean',
            'joined_date' => 'date',
        ];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function branch(): BelongsTo  { return $this->belongsTo(Branch::class); }

    public function accessibleBranches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'user_branch_access')
            ->withPivot('is_primary')->withTimestamps();
    }

    public function canAccessBranch($branchId): bool
    {
        if ($this->can_access_all_branches) return true;
        if ((int)$this->branch_id === (int)$branchId) return true;
        return $this->accessibleBranches()->where('branches.id', $branchId)->exists();
    }

    public function getAllAccessibleBranches()
    {
        if ($this->can_access_all_branches && $this->company) {
            return $this->company->branches()->active()->get();
        }
        $ids = $this->accessibleBranches->pluck('id')->toArray();
        if ($this->branch_id && !in_array($this->branch_id, $ids, true)) $ids[] = $this->branch_id;
        return Branch::whereIn('id', $ids)->active()->get();
    }

    public function scopeForCompany($q, $companyId) { return $q->where('company_id', $companyId); }
    public function scopeForBranch($q, $branchId) {
        return $q->where('branch_id', $branchId)
            ->orWhereHas('accessibleBranches', fn($qq) => $qq->where('branches.id', $branchId));
    }
}
