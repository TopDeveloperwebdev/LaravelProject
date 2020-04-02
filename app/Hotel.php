<?php

namespace App;

use Illuminate\Support\Carbon;

class Hotel extends BaseModel
{

    /**
     *
     */
    protected $table = 'hotel';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function getDestinationAttribute()
    {
        return $this->location;
    }

    /**
     *
     */
    public function getTravelDateAttribute()
    {
        return $this->checkin_date ? Carbon::parse($this->checkin_date)->format('d/m/y') : '';
    }
}
