<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lapangan',
        'tipe_lapangan',
        'deskripsi',
        'kapasitas',
        'harga_per_jam',
        'status',
        'foto',
        'lokasi',
    ];

    protected $casts = [
        'harga_per_jam' => 'decimal:2',
    ];
}
