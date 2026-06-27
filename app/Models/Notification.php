<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'data',
        'channel',
        'status',
        'sent_at',
        'read_at',
        'external_id',
    ];

    protected $casts = [
        'data' => 'json',
        'sent_at' => 'datetime',
        'read_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function markAsRead()
    {
        return $this->update(['read_at' => now()]);
    }

    public function markAsSent()
    {
        return $this->update(['status' => 'sent', 'sent_at' => now()]);
    }

    public function markAsFailed()
    {
        return $this->update(['status' => 'failed']);
    }

    public static function sendTransactionNotification($transaction)
    {
        return static::create([
            'user_id' => $transaction->user_id,
            'type' => 'transaction_complete',
            'title' => 'Setoran Sampah Tercatat',
            'message' => sprintf(
                'Terima kasih! Setoran sampah seberat %.2f Kg telah masuk ke saldo Anda sebesar Rp %s.',
                $transaction->berat_kg,
                number_format($transaction->total_rp, 0, ',', '.')
            ),
            'data' => [
                'transaction_id' => $transaction->id,
                'berat_kg' => $transaction->berat_kg,
                'total_rp' => $transaction->total_rp,
                'poin' => $transaction->poin_awarded ?? 0,
            ],
            'channel' => 'in_app',
            'status' => 'pending',
        ]);
    }

    public static function sendWithdrawalNotification($withdrawal)
    {
        return static::create([
            'user_id' => $withdrawal->user_id,
            'type' => 'withdrawal_approved',
            'title' => 'Pencairan Dana Berhasil',
            'message' => sprintf(
                'Pencairan dana sebesar Rp %s telah berhasil diproses. Silakan cek riwayat transaksi Anda.',
                number_format($withdrawal->nominal, 0, ',', '.')
            ),
            'data' => [
                'withdrawal_id' => $withdrawal->id,
                'nominal' => $withdrawal->nominal,
                'metode' => $withdrawal->metode,
            ],
            'channel' => 'in_app',
            'status' => 'pending',
        ]);
    }

    public static function sendAdminAlert($title, $message, $adminUsers = null)
    {
        if ($adminUsers === null) {
            $adminUsers = User::whereHas('roles', fn($q) => $q->where('name', 'admin'))->pluck('id');
        }

        return static::insert(
            $adminUsers->map(fn($userId) => [
                'user_id' => $userId,
                'type' => 'system_alert',
                'title' => $title,
                'message' => $message,
                'data' => null,
                'channel' => 'in_app',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );
    }
}
