<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\TransportType;
use App\Models\TransportCompany;

class CompanyTransportType extends Model
{
    use HasFactory;

    protected $fillable = ['transport_type_id', 'transport__company_id', 'licenceplate_number', 'city_id'];

    public function city() {
        return $this->belongsTo(City::class);
    }
    
    public function transportType() {
        return $this->belongsTo(TransportType::class);
    }

    public function transportCompany() {
        return $this->belongsTo(TransportCompany::class);
    }

}
