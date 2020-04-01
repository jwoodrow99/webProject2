<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aboutus extends Controller
{
    //
    function index () {
        return view('.aboutus/aboutus');
    }
}
