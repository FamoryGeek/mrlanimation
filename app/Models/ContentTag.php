<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentTag extends Model
{
    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
