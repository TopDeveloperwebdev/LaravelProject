<?php

namespace App;

use Carbon\Carbon;

class CarHire extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_hire';

    /**
     * The protected fields.
     *
     * @var string
     */
    protected $guarded = [
        'id',
    ];

    /**
     *
     */
    public function requisitioner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     *
     */
    public function getStartDateAttribute()
    {
        return $this->attributes['start_date'] ? Carbon::parse($this->attributes['start_date'])->format('d/m/y') : '';
    }

    /**
     *
     */
    public function getStartDateRawAttribute()
    {
        return $this->attributes['start_date'];
    }

}
