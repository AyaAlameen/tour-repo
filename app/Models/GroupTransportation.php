<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupTransportation extends Pivot
{
    public $incrementing = true;

    protected $table = 'group_transportations';

    protected $fillable = ['group_id', 'transportation_id', 'dates'];

    protected $casts = [
        'dates' => 'array'
    ];

}