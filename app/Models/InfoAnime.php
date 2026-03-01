<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoAnime extends Model
{
    protected $table = 'info_anime';

    protected $fillable = [
        'title',
        'image_url',
        'release_date',
        'genre',
        'slug',
        'sinopsis',
    ];

    public $timestamps = false;

    public function scopeLastFive($query)
    {
        return $query->orderBy('id', 'desc')->limit(5);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'anime_id');
    }

    public static function findByTitle($title)
    {
        return self::where('title', $title)->first();
    }
}