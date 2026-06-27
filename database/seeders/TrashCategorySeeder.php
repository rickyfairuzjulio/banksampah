<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrashCategory;

class TrashCategorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
                    ['name' => 'Plastik', 'price_per_kg' => 3000, 'material_type' => 'anorganik'],
                    ['name' => 'Kardus', 'price_per_kg' => 1500, 'material_type' => 'anorganik'],
                    ['name' => 'Kertas', 'price_per_kg' => 1200, 'material_type' => 'anorganik'],
                    ['name' => 'Logam', 'price_per_kg' => 8000, 'material_type' => 'anorganik'],
                    ['name' => 'Kaca', 'price_per_kg' => 2000, 'material_type' => 'anorganik'],
        ];

        foreach ($items as $item) {
            TrashCategory::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
