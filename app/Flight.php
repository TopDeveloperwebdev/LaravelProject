<?php

namespace App;

use Illuminate\Support\Carbon;

class Flight extends BaseModel
{

    /**
     *
     */
    protected $table = 'flight';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function getDestinationAttribute()
    {
        return $this->to;
    }

    /**
     *
     */
    public function getTravelDateAttribute()
    {
        return $this->departure_date ? Carbon::parse($this->departure_date)->format('d/m/y') : '';
    }
}
