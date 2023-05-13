<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;
use App\Models\City;
use App\Models\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['city_id'];

    public function places() {
        return $this->hasMany(Place::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }

}
