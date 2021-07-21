<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produt_image extends Model
{
    protected $table = 'product_image';
    protected $filelable = ['image','prod_id','name_image'];
}
