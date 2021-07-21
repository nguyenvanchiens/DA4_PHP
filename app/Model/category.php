<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
    protected $table = 'category';
    protected $filelable = ['name','slug','status','parent_id'];

    //mô hình ORM 1-n
    public function Product()
    {
        return $this->hasMany(product::class,'cate_id','id');
    }
    public function childs()
    {
        return $this->hasMany(category::class,'parent_id');
    }
}
