<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
                ->constrained('companies')
                ->cascadeOnDelete();

            $table->string('slug');  // unique per company
            $table->string('name');
            $table->string('subject')->nullable();
            $table->longText('body');

            $table->enum('format', ['markdown', 'blade', 'html'])->default('markdown');

            $table->boolean('is_system')->default(true);
            $table->boolean('is_active')->default(true);

            $table->foreignId('updated_by')->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['company_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('templates');
    }
};
