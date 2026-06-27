<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePickupRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
                'estimasi_berat' => 'required|numeric|min:5',
            'address' => 'required|string',
            'scheduled_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
                'estimasi_berat.min' => 'Estimasi berat minimal 5 Kg untuk permohonan jemput.',
        ];
    }
}
