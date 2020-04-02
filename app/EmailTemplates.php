<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplates extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public $table = 'email_templates';


}
