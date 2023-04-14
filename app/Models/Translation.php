<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['model_id', 'model_type', 'locale', 'name', 'description', 'address', 'first_name', 'last_name', 'certificates', 'type', 'full_name', 'job'];

    public function model()
    {
        return $this->morphTo();
    }
}
