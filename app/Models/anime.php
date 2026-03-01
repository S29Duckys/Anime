<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    // Ta table s'appelle info_anime, pas animes
    protected $table = 'info_anime';

    protected $fillable = [
        'title',
        'image_url',
        'release_date',
        'genre',
        'slug',
        'sinopsis',
    ];

    public function saisons()
    {
        return $this->hasMany(Saison::class, 'info_anime_id')->orderBy('numero');
    }
}
