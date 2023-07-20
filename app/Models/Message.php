<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'message'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
