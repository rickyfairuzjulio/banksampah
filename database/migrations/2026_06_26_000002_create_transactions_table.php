<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('petugas_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('trash_category_id')->constrained()->onDelete('restrict');
            $table->decimal('berat_kg', 10, 3);
            $table->decimal('harga_snapshot', 12, 2);
            $table->decimal('total_rp', 14, 2);
            $table->enum('tipe_setoran', ['jemput', 'mandiri']);
            $table->string('status')->default('pending');
            $table->string('foto_bukti')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
