<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUjian extends Model
{
    use HasFactory;

    protected $table = 'detail_ujians';
    protected $fillable = ['ujian_id', 'soal', 'jawaban_benar', 'pilihan_jawaban'];

    protected $casts = [
        'pilihan_jawaban' => 'array'
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}