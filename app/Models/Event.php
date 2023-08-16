<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;
use App\Models\Service;
use App\Models\Translation;
use App\Models\Booking;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['place_id', 'service_id', 'cost', 'start_date', 'end_date'];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
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
