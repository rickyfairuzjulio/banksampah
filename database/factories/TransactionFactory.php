<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    public function definition()
    {
        $category = \App\Models\TrashCategory::inRandomOrder()->first() ?: TrashCategory::factory()->create();
        $user = \App\Models\User::inRandomOrder()->first() ?: User::factory()->create();

        $berat = $this->faker->randomFloat(3, 0.5, 20);
        $harga = $category->price_per_kg;

        return [
            'id' => Str::uuid()->toString(),
            'user_id' => $user->id,
            'petugas_id' => null,
            'trash_category_id' => $category->id,
            'berat_kg' => $berat,
            'harga_snapshot' => $harga,
            'total_rp' => $berat * (float)$harga,
            'tipe_setoran' => 'jemput',
            'status' => 'selesai',
        ];
    }
}
