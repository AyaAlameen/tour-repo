<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'full_name', 'identifier', 'phone', 'people_count', 'start_date', 'end_date', 'reservation_period', 'cost', 'model_id', 'model_type'];

    public function user(){
        return belongsTo(User::class);
    }

    public function model()
    {
        return $this->morphTo();
    }
}
