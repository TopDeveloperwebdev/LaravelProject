<?php

namespace App;

class Stores extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';

    /**
     * The guarded fields.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Date fields.
     *
     * @var array
     */
    protected $dates = [
        'placed_at',
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
