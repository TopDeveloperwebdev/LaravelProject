<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;

    /**
     *
     */
    protected $defaults = [];

    /**
     *
     */
    public static function create($attributes = [])
    {
        $model = new static($attributes);
        $model->save();
        return $model;
    }

    /**
     *
     */
    public function setDefaults()
    {
        $methods = preg_grep('/^default/', preg_grep('/Attribute$/', get_class_methods($this)));

        foreach ($this->defaults as $key => $value) {
            $this->{$key} = $this->{$key} ?? $value;
        }

        foreach ($methods as $m) {
            $key = str_replace("Attribute", "", $m);
            $key = str_replace("default", "", $key);
            $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

            $this->{$key} = $this->{$key} ?? $this->{$m}();
        }
    }

    /**
     *
     */
    public function save(array $options = [])
    {
        $this->setDefaults();
        return parent::save($options);
    }

    /**
     *
     */
    public function notes()
    {
        return $this->hasMany(Notes::class, 'item_id')->where('order_id', $this->order_id);
    }

}
