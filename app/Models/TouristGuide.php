<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TouristGuide extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'image', 'description', 'certificates', 'phone', 'email'];
}
