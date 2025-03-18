<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =  [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
