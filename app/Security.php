<?php

namespace App;

class Security extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security';

    /**
     * The guarded fields.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
