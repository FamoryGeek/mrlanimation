<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [];

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function playlistItems()
    {
        return $this->hasMany(PlaylistItem::class);
    }
}
