<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $incrementing = false;  
    protected $keyType = 'string';    

    protected $fillable = [
        'id',
        'pseudo',
        'prenom',
        'nom',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function animeList()
    {
        return $this->belongsToMany(InfoAnime::class, 'user_anime_list')
            ->withPivot('status', 'progress', 'rating')
            ->withTimestamps();
    }
}
?>