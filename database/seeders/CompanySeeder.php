<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\Branch;
use App\Models\User;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // Main company
        $company = Company::firstOrCreate(
            ['code' => 'CO0001'],
            [
                'name' => 'ManuCore Industries',
                'legal_name' => 'ManuCore Industries (Pty) Ltd',
                'registration_number' => '2025/123456/07',
                'vat_number' => '4123456789',
                'email' => 'info@manucore.co.za',
                'phone' => '+27 12 345 6789',
                'website' => 'https://manucore.co.za',
                'address_line_1' => '123 Business Park',
                'address_line_2' => 'Corner Main and Commerce Streets',
                'city' => 'Pretoria',
                'state_province' => 'Gauteng',
                'postal_code' => '0001',
                'country' => 'South Africa',
                'bank_name' => 'Standard Bank',
                'bank_branch' => 'Pretoria CBD',
                'bank_branch_code' => '051001',
                'bank_account_name' => 'ManuCore Industries (Pty) Ltd',
                'bank_account_number' => '1234567890',
                'bank_account_type' => 'Current',
                'bank_swift_code' => 'SBZAZAJJ',
                'bank_reference' => 'INV-{INVOICE_NUMBER}',
                'currency_code' => 'ZAR',
                'currency_symbol' => 'R',
                'vat_rate' => 15.00,
                'vat_type' => 'exclusive',
                'financial_year_end' => 'February',
                'is_vat_registered' => true,
                'theme' => 'blue',
                'primary_color' => '#2171B5',
                'secondary_color' => '#6BAED6',
                'accent_color' => '#BDD7E7',
                'timezone' => 'Africa/Johannesburg',
                'date_format' => 'd/m/Y',
                'time_format' => 'H:i',
                'is_active' => true,
                'is_main' => true,
            ]
        );

        // Branches
        $head = Branch::firstOrCreate(
            ['company_id' => $company->id, 'code' => 'BR001'],
            [
                'name' => 'Head Office - Pretoria',
                'type' => 'head_office',
                'email' => 'pretoria@manucore.co.za',
                'phone' => '+27 12 345 6789',
                'address_line_1' => '123 Business Park',
                'address_line_2' => 'Corner Main and Commerce Streets',
                'city' => 'Pretoria',
                'state_province' => 'Gauteng',
                'postal_code' => '0001',
                'country' => 'South Africa',
                'latitude' => -25.7479,
                'longitude' => 28.2293,
                'operating_hours' => [
                    'monday'=>['is_open'=>true,'open'=>'08:00','close'=>'17:00'],
                    'tuesday'=>['is_open'=>true,'open'=>'08:00','close'=>'17:00'],
                    'wednesday'=>['is_open'=>true,'open'=>'08:00','close'=>'17:00'],
                    'thursday'=>['is_open'=>true,'open'=>'08:00','close'=>'17:00'],
                    'friday'=>['is_open'=>true,'open'=>'08:00','close'=>'17:00'],
                    'saturday'=>['is_open'=>false,'open'=>'','close'=>''],
                    'sunday'=>['is_open'=>false,'open'=>'','close'=>''],
                ],
                'use_company_banking' => true,
                'is_active' => true,
                'is_head_office' => true,
                'can_sell' => true,
                'can_purchase' => true,
                'holds_inventory' => true,
                'invoice_prefix' => 'INV',
                'quote_prefix' => 'QTE',
                'order_prefix' => 'ORD',
                'credit_note_prefix' => 'CN',
            ]
        );

        $jhb = Branch::firstOrCreate(
            ['company_id' => $company->id, 'code' => 'BR002'],
            [
                'name' => 'Johannesburg Branch',
                'type' => 'branch',
                'email' => 'jhb@manucore.co.za',
                'phone' => '+27 11 234 5678',
                'address_line_1' => '456 Commerce Road',
                'city' => 'Johannesburg',
                'state_province' => 'Gauteng',
                'postal_code' => '2000',
                'country' => 'South Africa',
                'latitude' => -26.2041,
                'longitude' => 28.0473,
                'operating_hours' => [
                    'monday'=>['is_open'=>true,'open'=>'08:30','close'=>'17:30'],
                    'tuesday'=>['is_open'=>true,'open'=>'08:30','close'=>'17:30'],
                    'wednesday'=>['is_open'=>true,'open'=>'08:30','close'=>'17:30'],
                    'thursday'=>['is_open'=>true,'open'=>'08:30','close'=>'17:30'],
                    'friday'=>['is_open'=>true,'open'=>'08:30','close'=>'16:30'],
                    'saturday'=>['is_open'=>true,'open'=>'09:00','close'=>'13:00'],
                    'sunday'=>['is_open'=>false,'open'=>'','close'=>''],
                ],
                'use_company_banking' => true,
                'is_active' => true,
                'is_head_office' => false,
                'can_sell' => true,
                'can_purchase' => false,
                'holds_inventory' => true,
            ]
        );

        $ct = Branch::firstOrCreate(
            ['company_id' => $company->id, 'code' => 'BR003'],
            [
                'name' => 'Cape Town Sales Office',
                'type' => 'sales_office',
                'email' => 'capetown@manucore.co.za',
                'phone' => '+27 21 456 7890',
                'address_line_1' => '789 Victoria Road',
                'city' => 'Cape Town',
                'state_province' => 'Western Cape',
                'postal_code' => '8001',
                'country' => 'South Africa',
                'latitude' => -33.9249,
                'longitude' => 18.4241,
                'use_company_banking' => true,
                'is_active' => true,
                'is_head_office' => false,
                'can_sell' => true,
                'can_purchase' => false,
                'holds_inventory' => false,
            ]
        );

        // Link admin (create if ENV present)
        $adminEmail = env('ADMIN_EMAIL', 'admin@ibez.co.za');
        $admin = User::where('email', $adminEmail)->first();
        if (!$admin && env('ADMIN_PASSWORD')) {
            $admin = User::create([
                'name' => env('ADMIN_NAME', 'System Admin'),
                'email' => $adminEmail,
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'email_verified_at' => now(),
            ]);
        }

        if ($admin) {
            $admin->update([
                'company_id' => $company->id,
                'branch_id' => $head->id,
                'employee_code' => 'EMP001',
                'department' => 'Management',
                'job_title' => 'System Administrator',
                'can_access_all_branches' => true,
                'joined_date' => now(),
            ]);

            $admin->accessibleBranches()->syncWithoutDetaching([
                $head->id => ['is_primary' => true],
                $jhb->id  => ['is_primary' => false],
                $ct->id   => ['is_primary' => false],
            ]);
        }

        $this->command->info('Company & branches seeded. Admin linked if available.');
    }
}
