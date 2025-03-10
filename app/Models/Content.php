<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    protected $guarded=[];

    public function type_content(): BelongsTo{
        return $this->belongsTo(TypeContent::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
