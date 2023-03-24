<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Translation;

class EmployeeProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'salary', 'identifier'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }
}
