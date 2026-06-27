<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\UploadedFile;

class WithdrawalFlowTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'petugas']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'nasabah']);
    }

    public function test_admin_can_approve_withdrawal_with_resi_and_balance_is_deducted()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $nasabah = User::factory()->create(['saldo' => 100000]);

        $withdrawal = Withdrawal::create([
            'user_id' => $nasabah->id,
            'nominal' => 50000,
            'metode' => 'transfer',
            'status' => 'pending',
        ]);

        $file = UploadedFile::fake()->image('resi.jpg');

        $this->withoutMiddleware();

        $response = $this->actingAs($admin)->post(route('admin.validasi.keuangan.approve', [$withdrawal->id]), [
            'foto_resi' => $file,
        ]);

        $response->assertRedirect();

        $withdrawal->refresh();
        $nasabah->refresh();

        $this->assertEquals('disetujui', $withdrawal->status);
        $this->assertEquals(50000.00, (float) $nasabah->saldo);
    }
}
