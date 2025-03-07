<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
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


}
