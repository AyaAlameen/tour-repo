<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TouristGuide;
use App\Models\Place;
use App\Models\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['tourist_guide_id', 'start_date', 'end_date', 'people_count', 'cost'];

    public function touristGuide() {
        return $this->belongsTo(TouristGuide::class);
    }

    public function places() {
        return $this->belongsToMany(Place::class, 'group_places', 'group_id', 'place_id');
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
