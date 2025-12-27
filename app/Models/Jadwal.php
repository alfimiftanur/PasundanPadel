<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_id',
        'date',
        'start_time',
        'end_time',
        'status'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Relasi ke Lapangan
     */
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'court_id');
    }

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class);
    }
}
