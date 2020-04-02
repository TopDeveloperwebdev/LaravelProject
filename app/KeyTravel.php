<?php

namespace App;

class KeyTravel extends BaseModel
{

    /**
     *
     */
    protected $table = 'key_travel';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function childRows()
    {
        $class = 'App\\' . $this->type;

        return $this->hasMany($class, 'parent_id');
    }

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
