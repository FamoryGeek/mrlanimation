<?php

namespace App\Models;

use App\Http\Controllers\Admin\CategorieController;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded =[];
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(CategorieController::class, 'parent_id');
    }
}
