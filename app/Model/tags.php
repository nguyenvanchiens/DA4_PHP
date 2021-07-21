<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table = 'tags';
    protected $guarded  = [];

    public function get_child_tag()
    {
        
    }
}
