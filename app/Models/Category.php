<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Translation;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
