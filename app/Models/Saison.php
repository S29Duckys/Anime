<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{
    protected $table = 'saisons';

    protected $fillable = [
        'info_anime_id',
        'numero',
        'annee',
        'image_url',
    ];

    public function anime()
    {
        return $this->belongsTo(anime::class, 'info_anime_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('numero');
    }
}
