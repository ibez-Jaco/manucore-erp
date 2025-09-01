<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // CUSTOMIZE YOUR ADMIN USER DETAILS HERE
        // ========================================
        $adminDetails = [
            'name' => 'System Administrator',      // Change this
            'email' => 'admin@ibez.co.za',    // Change this
            'password' => 'Q@zw1234',       // Change this (will be hashed)
        ];
        
        // Create roles
        $roles = [
            'Admin' => 'Full system access',
            'SettingsManager' => 'Manage system settings',
            'Manager' => 'Manage business operations',
            'Staff' => 'Regular staff access',
            'Viewer' => 'Read-only access',
        ];
        
        foreach ($roles as $roleName => $description) {
            Role::firstOrCreate(['name' => $roleName]);
        }
        
        echo "Created " . count($roles) . " roles\n";
        
        // Create basic permissions
        $permissions = [
            'dashboard.view',
            'customers.view',
            'customers.create',
            'customers.update',
            'customers.delete',
            'quotes.view',
            'quotes.create',
            'quotes.update',
            'quotes.delete',
            'settings.manage',
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
        ];
        
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        echo "Created " . count($permissions) . " permissions\n";
        
        // Assign all permissions to Admin role
        $adminRole = Role::where('name', 'Admin')->first();
        $adminRole->syncPermissions(Permission::all());
        
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => $adminDetails['email']],
            [
                'name' => $adminDetails['name'],
                'password' => Hash::make($adminDetails['password']),
                'email_verified_at' => now(),
            ]
        );
        
        // Assign Admin role
        $admin->assignRole('Admin');
        
        echo "\n========================================\n";
        echo "Admin User Created Successfully!\n";
        echo "========================================\n";
        echo "Email: " . $adminDetails['email'] . "\n";
        echo "Password: " . $adminDetails['password'] . "\n";
        echo "Role: Admin (Full Access)\n";
        echo "========================================\n";
    }
}
