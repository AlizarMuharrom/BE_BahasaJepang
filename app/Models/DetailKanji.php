<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKanji extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'kanji_id',
    ];

    protected $fillable = [
        'kanji_id',
        'kanji',
        'arti',
        'romaji',
        'voice_record'
    ];
    public function kanji()
    {
        return $this->belongsTo(Kanji::class, 'kanji_id');
    }
}
