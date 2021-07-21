<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    public function child_order(){
        return $this->hasMany(orderdetail::class,'order_id','id');
    }
}
