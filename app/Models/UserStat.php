<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    protected $guarded = [];

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
