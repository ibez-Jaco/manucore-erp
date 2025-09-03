<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            // Email content fields (if any missing)
            if (!Schema::hasColumn('companies', 'email_from_name'))     $table->string('email_from_name')->nullable()->after('gradient_end');
            if (!Schema::hasColumn('companies', 'email_from_address'))  $table->string('email_from_address')->nullable()->after('email_from_name');
            if (!Schema::hasColumn('companies', 'email_reply_to'))      $table->string('email_reply_to')->nullable()->after('email_from_address');
            if (!Schema::hasColumn('companies', 'email_signature'))     $table->text('email_signature')->nullable()->after('email_reply_to');
            if (!Schema::hasColumn('companies', 'email_footer'))        $table->text('email_footer')->nullable()->after('email_signature');
            if (!Schema::hasColumn('companies', 'invoice_terms'))       $table->text('invoice_terms')->nullable()->after('email_footer');
            if (!Schema::hasColumn('companies', 'quote_terms'))         $table->text('quote_terms')->nullable()->after('invoice_terms');

            // Mail server settings (per-company)
            if (!Schema::hasColumn('companies', 'mail_mailer'))         $table->string('mail_mailer')->nullable()->after('quote_terms'); // smtp, sendmail, postmark, etc.
            if (!Schema::hasColumn('companies', 'mail_host'))           $table->string('mail_host')->nullable()->after('mail_mailer');
            if (!Schema::hasColumn('companies', 'mail_port'))           $table->unsignedInteger('mail_port')->nullable()->after('mail_host');
            if (!Schema::hasColumn('companies', 'mail_username'))       $table->string('mail_username')->nullable()->after('mail_port');
            if (!Schema::hasColumn('companies', 'mail_password'))       $table->text('mail_password')->nullable()->after('mail_username'); // encrypted cast
            if (!Schema::hasColumn('companies', 'mail_encryption'))     $table->string('mail_encryption')->nullable()->after('mail_password'); // tls, ssl

            // Database connection settings (per-company; useful for multi-tenant routing)
            if (!Schema::hasColumn('companies', 'db_host'))             $table->string('db_host')->nullable()->after('mail_encryption');
            if (!Schema::hasColumn('companies', 'db_port'))             $table->unsignedInteger('db_port')->nullable()->after('db_host');
            if (!Schema::hasColumn('companies', 'db_database'))         $table->string('db_database')->nullable()->after('db_port');
            if (!Schema::hasColumn('companies', 'db_username'))         $table->string('db_username')->nullable()->after('db_database');
            if (!Schema::hasColumn('companies', 'db_password'))         $table->text('db_password')->nullable()->after('db_username'); // encrypted cast
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $cols = [
                'email_from_name','email_from_address','email_reply_to','email_signature','email_footer','invoice_terms','quote_terms',
                'mail_mailer','mail_host','mail_port','mail_username','mail_password','mail_encryption',
                'db_host','db_port','db_database','db_username','db_password',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('companies', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
