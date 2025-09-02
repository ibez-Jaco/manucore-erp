<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique()->comment('CO0001 etc.');
            $table->string('name');
            $table->string('legal_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('vat_number')->nullable();

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();

            // Physical address
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->default('South Africa');

            // Postal address
            $table->string('postal_address_line_1')->nullable();
            $table->string('postal_address_line_2')->nullable();
            $table->string('postal_city')->nullable();
            $table->string('postal_state_province')->nullable();
            $table->string('postal_postal_code')->nullable();
            $table->string('postal_country')->nullable();

            // Banking
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_branch_code')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_type')->nullable(); // Current/Cheque/Savings
            $table->string('bank_swift_code')->nullable();
            $table->string('bank_iban')->nullable();
            $table->text('bank_reference')->nullable();

            // Financial
            $table->string('currency_code', 3)->default('ZAR');
            $table->string('currency_symbol', 10)->default('R');
            $table->decimal('vat_rate', 5, 2)->default(15.00);
            $table->enum('vat_type', ['inclusive', 'exclusive'])->default('exclusive');
            $table->string('financial_year_end')->nullable();
            $table->boolean('is_vat_registered')->default(true);

            // Branding assets (string paths; Media Library used in 4.2)
            $table->string('logo_full_color')->nullable();
            $table->string('logo_white')->nullable();
            $table->string('logo_black')->nullable();
            $table->string('logo_icon')->nullable();
            $table->string('favicon')->nullable();

            // Hybrid theme: presets + custom
            $table->enum('theme', ['blue','teal','purple','coral','slate','custom'])->default('blue');
            $table->string('primary_color', 7)->nullable();
            $table->string('secondary_color', 7)->nullable();
            $table->string('accent_color', 7)->nullable();
            $table->string('gradient_start', 7)->nullable();
            $table->string('gradient_end', 7)->nullable();

            // Email & terms
            $table->string('email_from_name')->nullable();
            $table->string('email_from_address')->nullable();
            $table->string('email_reply_to')->nullable();
            $table->text('email_signature')->nullable();
            $table->text('email_footer')->nullable();
            $table->text('invoice_terms')->nullable();
            $table->text('quote_terms')->nullable();

            // System
            $table->string('timezone')->default('Africa/Johannesburg');
            $table->string('date_format')->default('d/m/Y');
            $table->string('time_format')->default('H:i');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_main')->default(true);

            // Meta
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index('code');
            $table->index('is_active');
            $table->index('is_main');
        });
    }

    public function down(): void {
        Schema::dropIfExists('companies');
    }
};
