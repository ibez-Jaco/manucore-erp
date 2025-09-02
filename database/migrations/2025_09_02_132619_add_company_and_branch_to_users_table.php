<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->after('email')->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->after('company_id')->constrained()->nullOnDelete();
            $table->string('employee_code', 20)->nullable()->after('branch_id');
            $table->string('department')->nullable()->after('employee_code');
            $table->string('job_title')->nullable()->after('department');
            $table->string('phone')->nullable()->after('job_title');
            $table->string('mobile')->nullable()->after('phone');
            $table->boolean('can_access_all_branches')->default(false)->after('mobile');
            $table->date('joined_date')->nullable()->after('can_access_all_branches');

            $table->index('company_id');
            $table->index('branch_id');
            $table->unique(['company_id','employee_code']);
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['company_id','employee_code']);
            $table->dropIndex(['company_id']);
            $table->dropIndex(['branch_id']);
            $table->dropForeign(['company_id']);
            $table->dropForeign(['branch_id']);
            $table->dropColumn([
                'company_id','branch_id','employee_code','department','job_title',
                'phone','mobile','can_access_all_branches','joined_date'
            ]);
        });
    }
};
