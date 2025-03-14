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
    ];

    public function detailKamuses()
    {
        return $this->hasMany(DetailKamus::class, 'kamus_id');
    }
}