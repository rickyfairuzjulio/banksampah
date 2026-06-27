<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrashCategory;

class PriceController extends Controller
{
    public function index()
    {
        $prices = TrashCategory::all();
        return view('admin.harga.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.harga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price_per_kg' => 'required|numeric|min:0',
            'active' => 'boolean',
        ]);

        TrashCategory::create($request->only(['name','price_per_kg','active']));

        return redirect()->route('admin.harga.index')->with('status','Kategori harga dibuat.');
    }

    public function edit(TrashCategory $harga)
    {
        return view('admin.harga.edit', compact('harga'));
    }

    public function update(Request $request, TrashCategory $harga)
    {
        $request->validate([
            'name' => 'required|string',
            'price_per_kg' => 'required|numeric|min:0',
            'active' => 'boolean',
        ]);

        $harga->update($request->only(['name','price_per_kg','active']));

        return redirect()->route('admin.harga.index')->with('status','Kategori harga diperbarui.');
    }

    public function destroy(TrashCategory $harga)
    {
        $harga->delete();
        return back()->with('status','Kategori harga dihapus.');
    }
}
