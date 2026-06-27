<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $petugasRole = Role::firstOrCreate(['name' => 'petugas']);
        $nasabahRole = Role::firstOrCreate(['name' => 'nasabah']);

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@sisampah.test'],
            [
                'name' => 'Admin SiSampah',
                'password' => bcrypt('password'),
                'saldo' => 0,
            ]
        );
        $admin->assignRole('admin');

        // Petugas
        $petugas = User::firstOrCreate(
            ['email' => 'petugas@sisampah.test'],
            [
                'name' => 'Petugas Lapangan',
                'password' => bcrypt('password'),
                'saldo' => 0,
            ]
        );
        $petugas->assignRole('petugas');

        // Nasabah sample (20)
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            $email = "nasabah{$i}@sisampah.test";
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $faker->name(),
                    'password' => bcrypt('password'),
                    'saldo' => $faker->numberBetween(10000, 2000000),
                    'rt' => (string)$faker->numberBetween(1,10),
                    'rw' => (string)$faker->numberBetween(1,5),
                    'alamat_lengkap' => $faker->address(),
                    'total_poin_lingkungan' => $faker->numberBetween(0,500),
                ]
            );
            $user->assignRole('nasabah');
        }
    }
}
