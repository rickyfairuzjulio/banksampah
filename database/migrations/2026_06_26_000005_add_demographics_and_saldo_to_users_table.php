<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'saldo')) {
                $table->decimal('saldo', 14, 2)->default(0)->after('email');
            }

            $table->string('rt')->nullable()->after('saldo');
            $table->string('rw')->nullable()->after('rt');
            $table->text('alamat_lengkap')->nullable()->after('rw');
            $table->unsignedInteger('total_poin_lingkungan')->default(0)->after('alamat_lengkap');

            $table->index(['rt', 'rw']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['rt', 'rw']);
            $table->dropColumn(['saldo', 'rt', 'rw', 'alamat_lengkap', 'total_poin_lingkungan']);
        });
    }
};
