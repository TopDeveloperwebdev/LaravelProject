<?php

namespace App;

class Status extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_status';

    /**
     * The protected fields.
     *
     * @var string
     */
    protected $guarded = [
        'id',
    ];

}
