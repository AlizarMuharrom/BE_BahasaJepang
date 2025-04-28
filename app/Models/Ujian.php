<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'judul', 'jumlah_soal'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function questions()
    {
        return $this->hasMany(DetailUjian::class, 'ujian_id');
    }

    public function results()
    {
        return $this->hasMany(HasilUjian::class, 'ujian_id');
    }
}