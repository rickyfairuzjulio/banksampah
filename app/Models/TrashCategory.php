<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_per_kg',
        'active',
            'material_type',
        ];

        protected $casts = [
            'price_per_kg' => 'decimal:2',
            'active' => 'boolean',
            'material_type' => 'string',
        ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
