<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $filelable = ['name','slug','originalprice','price','slae_price','image','moreimage','description','size','color','quantity','status','hot','cate_id','image_path'];

    //ORM n-1
    public function Cate(){
        return $this->hasOne(category::class,'id','cate_id');
    }
    public function child_Image()
    {
        return $this->hasMany(produt_image::class,'prod_id','id');
    }

   /**
    * The roles that belong to the Product
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function tags()
   {
       return $this->belongsToMany(tags::class, 'product_tag', 'prod_id', 'tag_id');
   }
   public function sell_count()
   {
       return $this->hasMany(orderDetail::class,'prod_id','id');
   }
   public function child_tag()
   {
       return $this->hasMany(product_tag::class,'prod_id','id');
   }
   public function get_child_attribute()
   {
       return $this->hasMany(attribute_product::class,'prod_id','id');
   }
}
