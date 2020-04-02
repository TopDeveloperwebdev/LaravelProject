<?php

namespace App;

class Notes extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

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
    protected $with = [
        'user',
    ];

    /**
     *
     */
    public function item()
    {
        return $this->belongsTo(CatalogueOrders::class, 'item_id');
    }


    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
