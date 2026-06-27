<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrashCategory;

class NasabahController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user()->load('roles');
        $prices = TrashCategory::where('active', true)->get();
        return view('nasabah.dashboard', compact('user', 'prices'));
    }

    public function createPickup()
    {
        return view('nasabah.jemput.create');
    }

    public function storePickup(Request $request)
    {
        // Business validation will be implemented in Phase 3 (FormRequest)
        $request->validate([
            'estimasi_berat' => 'required|numeric|min:0.001',
        ]);

        // Placeholder: store pickup request
        return redirect()->route('nasabah.dashboard')->with('status', 'Permohonan jemput diterima.');
    }

    public function wallet()
    {
        $user = auth()->user();
        return view('nasabah.wallet', compact('user'));
    }
}
