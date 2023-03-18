<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;
use App\Models\Offer;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'place_id', 'cost', 'description', 'is_additional'];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }
}
