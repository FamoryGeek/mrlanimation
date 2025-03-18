<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $guarded = [];
    public function Visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
