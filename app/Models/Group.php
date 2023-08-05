<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TouristGuide;
use App\Models\Place;
use App\Models\Translation;
use App\Models\GroupPlace;
use App\Models\Transportation;
use App\Models\GroupTransportation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['tourist_guide_id', 'start_date', 'end_date', 'people_count', 'cost'];

    public function touristGuide() {
        return $this->belongsTo(TouristGuide::class);
    }

    public function places() {
        return $this->belongsToMany(Place::class, 'group_places', 'group_id', 'place_id')->withPivot('id', 'service_id')->using(GroupPlace::class);
    }

    public function transportations() {
        return $this->belongsToMany(Transportation::class, 'group_transportations', 'group_id', 'transportation_id')->withPivot('id', 'dates')->using(GroupTransportation::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
