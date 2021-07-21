<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class attributes extends Model
{
    protected $table = 'attributes';
    protected $guarded  = [];

    public function get_child_value()
    {
        return $this->hasMany(attribute_value::class,'attri_id','id');
    }
}
