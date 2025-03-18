<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Visiteur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded=[];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guard = 'visiteur';

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function userStats()
    {
        return $this->hasMany(UserStat::class);
    }

    public function userActivities()
    {
        return $this->hasMany(UserActivity::class);
    }

}
