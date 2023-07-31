<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Translation;
use App\Models\CompanyTransportType;
use App\Models\Transportation;

class TransportCompany extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image', 'email', 'phone'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'model');
    }

    public function companyTransportTypes() {
        return $this->hasMany(CompanyTransportType::class);
    }

    public function transportation() {
        return $this->hasMany(Transportation::class);
    }
}
