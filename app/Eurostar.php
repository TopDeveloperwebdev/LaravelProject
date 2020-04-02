<?php

namespace App;

use Illuminate\Support\Carbon;

class Eurostar extends BaseModel
{

    /**
     *
     */
    protected $table = 'eurostar';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function getDestinationAttribute()
    {
        return $this->to_station;
    }

    /**
     *
     */
    public function getTravelDateAttribute()
    {
        return $this->departure_date ? Carbon::parse($this->departure_date)->format('d/m/y') : '';
    }

}
