<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function contentTags()
    {
        return $this->hasMany(ContentTag::class);
    }
}
