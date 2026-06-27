<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimbanganRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('petugas');
    }

    public function rules()
    {
        return [
            'berat_kg' => 'required|numeric|min:0.001',
            'trash_category_id' => 'required|exists:trash_categories,id',
            'foto_bukti' => 'nullable|image|max:5120',
        ];
    }
}
