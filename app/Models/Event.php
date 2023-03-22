<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;
use App\Models\Translation;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['place_id', 'cost', 'start_date', 'end_date'];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
