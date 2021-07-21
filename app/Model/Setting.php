<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $filelable = ['config_key','config_value'];
}
