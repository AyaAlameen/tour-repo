<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Place;

class UserPermission extends Pivot
{

    protected $table = 'user_permissions';

    
    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
