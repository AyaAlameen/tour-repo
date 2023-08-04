<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupTransportCompany extends Pivot
{

    protected $fillable = ['group_id', 'transport_company_id', 'dates'];

    protected $casts = [
        'dates' => 'array'
    ];

}