<?php

namespace App;

class Catering extends BaseModel
{

    /**
     *
     */
    protected $table = 'catering';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     *
     */
    protected $dates = [
        'event_date',
        'placed_at',
        'completed_at',
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
}
