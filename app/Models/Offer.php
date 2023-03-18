<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Service;
use App\Models\Place;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'service_id', 'place_id', 'cost', 'description', 'start_date', 'end_date'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function place() {
        return $this->belongsTo(Place::class);
    }
}
