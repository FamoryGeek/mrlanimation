<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeContent extends Model
{
    protected $guarded=[];

    public function contents(){
        return $this->hasMany(Content::class);
    }
}
