<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('code', 10);
            $table->string('name');
            $table->enum('type', ['head_office','branch','warehouse','sales_office','service_center'])->default('branch');

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();

            // Address
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->default('South Africa');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Manager
            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();

            // Hours / timezone
            $table->json('operating_hours')->nullable();
            $table->string('timezone')->nullable();

            // Banking (branch overrides)
            $table->boolean('use_company_banking')->default(true);
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_branch_code')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_type')->nullable();

            // Settings
            $table->boolean('is_active')->default(true);
            $table->boolean('is_head_office')->default(false);
            $table->boolean('can_sell')->default(true);
            $table->boolean('can_purchase')->default(false);
            $table->boolean('holds_inventory')->default(false);

            // Numbering
            $table->string('invoice_prefix', 10)->nullable();
            $table->string('quote_prefix', 10)->nullable();
            $table->string('order_prefix', 10)->nullable();
            $table->string('credit_note_prefix', 10)->nullable();

            // Meta
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->unique(['company_id','code']);
            $table->index('is_active');
            $table->index('is_head_office');
            $table->index('type');
        });
    }

    public function down(): void {
        Schema::dropIfExists('branches');
    }
};
