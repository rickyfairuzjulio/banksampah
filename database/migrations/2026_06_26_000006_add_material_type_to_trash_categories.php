<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trash_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('trash_categories', 'material_type')) {
                $table->string('material_type')->nullable()->after('price_per_kg')->index();
            }
        });
    }

    public function down(): void
    {
        Schema::table('trash_categories', function (Blueprint $table) {
            $table->dropColumn('material_type');
        });
    }
};
