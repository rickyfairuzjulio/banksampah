<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Withdrawal;
use App\Models\TrashCategory;
use App\Models\User;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $petugas = User::role('petugas')->first();
        $nasabahs = User::role('nasabah')->get();
        $categories = TrashCategory::where('active', true)->get();

        if ($categories->isEmpty()) {
            TrashCategory::factory()->count(5)->create();
            $categories = TrashCategory::all();
        }

        foreach ($nasabahs as $nasabah) {
            $count = rand(3,8);
            for ($i=0;$i<$count;$i++) {
                $cat = $categories->random();
                $berat = rand(1,20) + (rand(0,999)/1000);
                $harga = $cat->price_per_kg;
                $total = $berat * (float)$harga;

                Transaction::create([
                    'id' => \Illuminate\Support\Str::uuid()->toString(),
                    'user_id' => $nasabah->id,
                    'petugas_id' => $petugas?->id,
                    'trash_category_id' => $cat->id,
                    'berat_kg' => $berat,
                    'harga_snapshot' => $harga,
                    'total_rp' => $total,
                    'tipe_setoran' => 'jemput',
                    'status' => 'selesai',
                ]);
            }

            // Random withdrawals
            if (rand(0,1)) {
                Withdrawal::create([
                    'user_id' => $nasabah->id,
                    'nominal' => min($nasabah->saldo, rand(50000,200000)),
                    'metode' => 'transfer',
                    'status' => 'pending',
                ]);
            }
        }

        // Create some articles
        \App\Models\Article::factory()->count(6)->create();
    }
}
