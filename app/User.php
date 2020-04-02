<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *
     */
    public function getTypeAttribute()
    {

        if ($this->partner) {
            return 'Partner';
        }

        if ($this->supplier) {
            return 'Supplier';
        }

        if ($this->is_admin) {
            return $this->admin_view ? 'Administrator' : 'Requisitioner';
        }

        if (!$this->is_admin) {
            return 'Requisitioner';
        }

    }

    /**
     *
     */
    public function catalogueOrders()
    {
        return $this->hasMany(CatalogueOrders::class, 'user_id');
    }

    /**
     *
     */
    public function keyTravel()
    {
        return $this->hasMany(KeyTravel::class, 'user_id');
    }

    /**
     *
     */
    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'user_id');
    }

    /**
     *
     */
    public function carHire()
    {
        return $this->hasMany(CarHire::class, 'user_id');
    }

    /**
     *
     */
    public function training()
    {
        return $this->hasMany(Training::class, 'user_id');
    }

    /**
     *
     */
    public function stores()
    {
        return $this->hasMany(Stores::class, 'user_id');
    }

    /**
     *
     */
    public function department()
    {
        return $this->hasOne(Departments::class, 'id', 'primary_department_location_id');
    }

    /**
     *
     */
    public function partnerInfo()
    {
        return $this->hasOne(Partners::class, 'user_id');
    }

    /**
     *
     */
    public function noneCatalogueOrders()
    {
        return $this->hasMany(NoneCatalogueOrder::class, 'user_id');
    }

    /**
     *
     */
    public function catering()
    {
        return $this->hasMany(Catering::class, 'user_id');
    }

    /**
     *
     */
    public function security()
    {
        return $this->hasMany(Security::class, 'user_id');
    }


}
