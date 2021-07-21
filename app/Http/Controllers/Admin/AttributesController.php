<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\attributes;


class AttributesController extends Controller
{
    public function getAddAttributes()
    {
        return view('backend.attribute.add_attribute');
    }
    public function AddValues()
    {
        return view('backend.attribute.add_attribute');
    }
}
