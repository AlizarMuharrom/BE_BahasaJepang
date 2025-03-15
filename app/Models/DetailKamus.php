<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKamus extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamus_id',
        'kanji',
        'arti',
        'voice_record',
    ];

    public function kamus()
    {
        return $this->belongsTo(Kamus::class, 'kamus_id');
    }
}