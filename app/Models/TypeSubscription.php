<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeSubscription extends Model
{
    protected $guarded=[];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
