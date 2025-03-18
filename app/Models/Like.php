<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
}
