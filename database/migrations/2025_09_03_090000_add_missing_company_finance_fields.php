<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Address
            if (!Schema::hasColumn('companies', 'address_line_1'))      $table->string('address_line_1')->nullable()->after('website');
            if (!Schema::hasColumn('companies', 'address_line_2'))      $table->string('address_line_2')->nullable()->after('address_line_1');
            if (!Schema::hasColumn('companies', 'city'))                 $table->string('city')->nullable()->after('address_line_2');
            if (!Schema::hasColumn('companies', 'state_province'))       $table->string('state_province')->nullable()->after('city');
            if (!Schema::hasColumn('companies', 'postal_code'))          $table->string('postal_code')->nullable()->after('state_province');
            if (!Schema::hasColumn('companies', 'country'))              $table->string('country')->nullable()->after('postal_code');
            if (!Schema::hasColumn('companies', 'timezone'))             $table->string('timezone')->nullable()->after('quote_terms');

            // Banking
            if (!Schema::hasColumn('companies', 'bank_name'))            $table->string('bank_name')->nullable()->after('postal_country');
            if (!Schema::hasColumn('companies', 'bank_branch'))          $table->string('bank_branch')->nullable()->after('bank_name');
            if (!Schema::hasColumn('companies', 'bank_branch_code'))     $table->string('bank_branch_code')->nullable()->after('bank_branch');
            if (!Schema::hasColumn('companies', 'bank_account_name'))    $table->string('bank_account_name')->nullable()->after('bank_branch_code');
            if (!Schema::hasColumn('companies', 'bank_account_number'))  $table->string('bank_account_number')->nullable()->after('bank_account_name');
            if (!Schema::hasColumn('companies', 'bank_account_type'))    $table->string('bank_account_type')->nullable()->after('bank_account_number');

            // Tax
            if (!Schema::hasColumn('companies', 'vat_number'))           $table->string('vat_number')->nullable()->after('registration_number');
            if (!Schema::hasColumn('companies', 'default_tax_rate'))     $table->decimal('default_tax_rate', 5, 2)->nullable()->after('vat_number');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Drop only if they exist (safe down)
            foreach ([
                'address_line_1','address_line_2','city','state_province','postal_code','country','timezone',
                'bank_name','bank_branch','bank_branch_code','bank_account_name','bank_account_number','bank_account_type',
                'default_tax_rate', // keep vat_number since it may be core elsewhere; drop if you really want:
                // 'vat_number',
            ] as $col) {
                if (Schema::hasColumn('companies', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
