<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Service;

class GroupPlace extends Pivot
{

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}