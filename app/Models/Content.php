<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($content) {
            $content->slug = Str::slug($content->title) . '-' . Str::random(6);
        });
    }

    public function type_content(){
        return $this->belongsTo(TypeContent::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function contentTags()
    {
        return $this->hasMany(ContentTag::class);
    }

    public function playlistItems()
    {
        return $this->hasMany(PlaylistItem::class);
    }

    public function userStats()
    {
        return $this->hasMany(UserStat::class);
    }
}
