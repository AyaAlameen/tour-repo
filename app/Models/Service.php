<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;
use App\Models\Offer;
use App\Models\Translation;
use App\Models\Image;
use App\Models\Booking;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['place_id', 'cost', 'is_additional', 'image', 'reservation_period', 'services_count', 'people_count'];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'model');
    }

}
