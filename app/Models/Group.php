<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TouristGuide;
use App\Models\Place;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'tourist_guide_id', 'people_count', 'description', 'cost'];

    public function touristGuide() {
        return $this->belongsTo(TouristGuide::class);
    }

    public function places() {
        return $this->belongsToMany(Place::class, 'group_places', 'group_id', 'place_id');
    }
}
