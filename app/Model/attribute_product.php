<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class attribute_product extends Model
{
    protected $table = 'attribute_product';
    protected $guarded  = [];

   
    public function parent_attributes()
    {
        return $this->hasOne(attribute_value::class,'id','attribute_value_id');
    }
}
