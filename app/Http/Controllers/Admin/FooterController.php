<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        return view('backend.footer.index');
    }
    public function getAddFooter()
    {
        return view('backend.footer.addfooter');
    }
}
