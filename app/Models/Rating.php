<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;
use App\Models\User;

class Rating extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['place_id', 'user_id', 'stars', 'reviews'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function place() {
        return $this->belongsTo(Place::class);
    }
}
