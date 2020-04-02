<?php

namespace App;

class Departments extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'department';

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
    public function getDeliveryLocationAttribute()
    {
        $address = $this->building_name ? $this->building_name . ', ' : '';
        $address .= $this->address1 ? $this->address1 . ', ' : '';
        $address .= $this->address2 ? $this->address2 . ', ' : '';
        $address .= $this->address3 ? $this->address3 . ', ' : '';
        $address .= $this->city ? $this->city . ', ' : '';
        $address .= $this->postcode ? $this->postcode . '' : '';

        return $address;
    }
}
