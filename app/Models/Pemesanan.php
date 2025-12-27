<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jadwal_id',
        'court_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'notes',
        'duration',
        'total_price',
        'payment_status',
        'status', 
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Lapangan
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'court_id');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
