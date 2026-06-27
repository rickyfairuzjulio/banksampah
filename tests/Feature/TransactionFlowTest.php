<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\TrashCategory;
use Spatie\Permission\Models\Role;

class TransactionFlowTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Ensure roles exist without running full seeder to avoid external DB dependency
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'petugas']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'nasabah']);

        // Ensure at least one category exists
        if (\App\Models\TrashCategory::count() === 0) {
            \App\Models\TrashCategory::factory()->create(['price_per_kg' => 3000, 'material_type' => 'anorganik']);
        }
    }

    public function test_petugas_can_submit_timbangan_and_update_user_saldo_and_points()
    {
        $petugas = User::factory()->create();
        $petugas->assignRole('petugas');

        $nasabah = User::factory()->create(['saldo' => 0, 'total_poin_lingkungan' => 0]);

        $category = TrashCategory::first() ?? TrashCategory::factory()->create(['price_per_kg' => 3000, 'material_type' => 'anorganik']);

        $this->withoutMiddleware();

        $response = $this->actingAs($petugas)->post(route('petugas.input.timbangan.store', [$nasabah->id]), [
            'berat_kg' => 2.5,
            'trash_category_id' => $category->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('transactions', [
            'user_id' => $nasabah->id,
            'trash_category_id' => $category->id,
        ]);

        $nasabah->refresh();
        $this->assertGreaterThan(0, $nasabah->saldo);
        $this->assertGreaterThan(0, $nasabah->total_poin_lingkungan);
    }
}
