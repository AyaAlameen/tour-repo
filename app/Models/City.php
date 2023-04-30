<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Translation;
use App\Models\Transportation;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }

    public function transportation() {
        return $this->hasMany(Transportation::class);
    }
}
