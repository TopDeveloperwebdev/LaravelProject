<?php

namespace App;

class Budget extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'budget';

    /**
     * The protected fields.
     *
     * @var string
     */
    protected $guarded = [
        'id',
    ];

}
