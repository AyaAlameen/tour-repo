<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Place;
use App\Models\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function places() {
        return $this->hasMany(Place::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
