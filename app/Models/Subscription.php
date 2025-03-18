<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $guarded=[];

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
    public function type_subscription()
    {
        return $this->belongsTo(TypeSubscription::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
