<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\District;
use App\Models\User;
use App\Models\Rating;
use App\Models\Event;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Translation;
use App\Models\Image;
use App\Models\Booking;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =['sub_category_id', 'district_id', 'geolocation', 'address', 'email', 'phone', 'cost', 'profit_ratio_1', 'profit_ratio_2'];

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function favorites() {
        return $this->belongsToMany(User::class, 'favorites', 'place_id', 'user_id');
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class, 'group_places', 'place_id', 'group_id');
    }

    public function services() {
        return $this->hasMany(Service::class);
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

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function getGeolocationArray()
    {
        $lat = explode(',', $this->geolocation)[0];
        $lng = explode(',', $this->geolocation)[1];
        return [$lat, $lng];;
    }
}
