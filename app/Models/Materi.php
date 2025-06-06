<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul'
    ];

    public function detail_materis()
    {
        return $this->hasMany(DetailMateri::class);
}
}