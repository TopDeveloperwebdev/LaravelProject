<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $guarded = [];

    public $table = 'claim';

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id', 'id');
    }
}
