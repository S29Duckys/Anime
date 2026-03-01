<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';

    protected $fillable = [
        'saison_id',
        'numero',
        'titre',
        'duree',
        'image_url',
    ];

    public function saison()
    {
        return $this->belongsTo(Saison::class);
    }
}
