<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Faq extends Controller
{
    //
    function index () {
        return view('.faq/faq');
    }
}
