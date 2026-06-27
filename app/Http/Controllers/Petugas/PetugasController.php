<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function manifes()
    {
        return view('petugas.manifes.index');
    }

    public function showInput($user_id)
    {
        return view('petugas.input.create', compact('user_id'));
    }

    public function storeInput(\App\Http\Requests\StoreTimbanganRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = \App\Models\User::findOrFail($user_id);

        \DB::beginTransaction();
        try {
            $category = \App\Models\TrashCategory::findOrFail($data['trash_category_id']);

            $harga_snapshot = $category->price_per_kg;
            $berat = (float) $data['berat_kg'];
            $total = $berat * (float) $harga_snapshot;

            $transaction = \App\Models\Transaction::create([
                'id' => \Illuminate\Support\Str::uuid()->toString(),
                'user_id' => $user->id,
                'petugas_id' => auth()->id(),
                'trash_category_id' => $category->id,
                'berat_kg' => $berat,
                'harga_snapshot' => $harga_snapshot,
                'total_rp' => $total,
                'tipe_setoran' => 'mandiri',
                'status' => 'selesai',
            ]);

            // Handle foto_bukti if uploaded
            if ($request->hasFile('foto_bukti')) {
                $path = $request->file('foto_bukti')->store('transactions', 'public');
                $transaction->foto_bukti = $path;
                $transaction->save();
            }

            // Update user saldo and points
            $user->saldo = bcadd((string)$user->saldo, (string)$total, 2);

            $pointsPerKg = ($category->material_type === 'organik') ? 10 : 20;
            $points = (int) round($berat * $pointsPerKg);
            $user->total_poin_lingkungan = $user->total_poin_lingkungan + $points;

            $user->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            throw $e;
        }

        return redirect()->route('petugas.dashboard.manifes')->with('status', 'Input timbangan berhasil dan saldo nasabah diperbarui.');
    }

    public function setorMandiriForm()
    {
        return view('petugas.setor.mandiri');
    }

    public function setorMandiriStore(Request $request)
    {
        $request->validate([
            'account_identifier' => 'required|string',
            'berat_kg' => 'required|numeric|min:0.001',
        ]);

        return back()->with('status', 'Setor mandiri tersimpan.');
    }
}
