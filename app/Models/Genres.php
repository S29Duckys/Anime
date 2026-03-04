<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'id',
        'nom',
        'slug',
        'created_at',
        'updated_at',
    ];
    
}
