<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'place_id', 'cost', 'description', 'start_date', 'end_date'];

    public function place() {
        return $this->belongsTo(Place::class);
    }
}
