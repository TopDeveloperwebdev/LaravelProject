<?php

namespace App;

class Training extends BaseModel
{

    /**
     *
     */
    protected $table = 'training';

    /**
     *
     */
    protected $fillable = [
        'user_id',
        'admin_id',
        'order_id',
        'requisition_no',
        'national',
        'international',
        'start_date',
        'end_date',
        'org_name',
        'url',
        'description',
        'reason',
        'value',
        'supplier_name',
        'contact_name',
        'supplier_email',
        'supplier_tel',
        'placed_at',
        'completed_at',
        'new_supplier',
        'currency',
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
