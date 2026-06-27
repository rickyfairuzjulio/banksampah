<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'petugas_id',
        'trash_category_id',
        'berat_kg',
        'harga_snapshot',
        'total_rp',
        'tipe_setoran',
        'status',
        'foto_bukti',
    ];

    protected $casts = [
        'berat_kg' => 'decimal:3',
        'harga_snapshot' => 'decimal:2',
        'total_rp' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function category()
    {
        return $this->belongsTo(TrashCategory::class, 'trash_category_id');
    }
}
