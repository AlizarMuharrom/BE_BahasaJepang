<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function detailKanji()
    {
        return $this->hasMany(DetailKanji::class, 'kanji_id');
    }
}
