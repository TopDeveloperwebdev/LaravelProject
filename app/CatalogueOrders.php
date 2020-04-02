<?php

namespace App;

class CatalogueOrders extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogue_orders';

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
    protected $dates = [
        'implemented_at',
        'received_at',
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
    public function setImplementedAtAttribute($value)
    {
        if ($value) {
            $this->attributes['implemented_at'] = now();
        } else {
            $this->attributes['implemented_at'] = null;
        }
    }

    /**
     *
     */
    public function setReceivedAtAttribute($value)
    {
        if ($value) {
            $this->attributes['received_at'] = $value;
        } else {
            $this->attributes['received_at'] = null;
        }
    }

    /**
     *
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
