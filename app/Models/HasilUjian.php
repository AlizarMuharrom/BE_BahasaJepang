<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ujian_id', 'jumlah_benar', 'score', 'detail_jawaban'];

    protected $casts = [
        'detail_jawaban' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}