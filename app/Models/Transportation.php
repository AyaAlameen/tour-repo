<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Translation;
use App\Models\City;
use App\Models\TransportCompany;

class Transportation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['carId', 'city_id', 'transport_company_id', 'passengers_number'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function transportCompany() {
        return $this->belongsTo(TransportCompany::class);
    }
}
