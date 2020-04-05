<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    function index () {
        return view('.faq/faq');
    }
}
