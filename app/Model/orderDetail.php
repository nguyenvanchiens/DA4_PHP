<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    protected $table = 'orderdetail';
    protected $guarded = [];
    public function parentProduct()
    {
        return $this->hasOne(product::class,'id','prod_id');
    }
    public function sell_product()
    {
        return $this->hasOne(order::class,'id','order_id');
    }
}
