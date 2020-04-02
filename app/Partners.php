<?php

namespace App;

class Partners extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_partners';

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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
