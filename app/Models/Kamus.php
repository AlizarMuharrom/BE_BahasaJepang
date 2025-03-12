<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamus extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'nama',
        'baca',
        'contoh_penggunaan',
    ];

    protected $casts = [
        'contoh_penggunaan' => 'array',
    ];
}