<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class NoneCatalogueOrder extends BaseModel
{
    /**
     *
     *
     */
    protected $table = 'non_catalogue_orders';

    /**
     *
     *
     */
    protected $guarded = [
        'id',
    ];

    /**
     *
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
    public function getFilesAttribute()
    {
        return collect(Storage::disk('files')->files($this->order_id . '/' . $this->id));
    }

    /**
     *
     */
    public function setQtyReceivedAttribute($value)
    {
        $this->attributes['qty_received'] = $value;
        $this->attributes['total'] = $this->price * $value;
    }

}
