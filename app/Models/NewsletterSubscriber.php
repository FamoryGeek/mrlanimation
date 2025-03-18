<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'user_id', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];
}
