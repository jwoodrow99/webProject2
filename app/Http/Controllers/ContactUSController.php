<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    //
    function index () {
        return view('.contactus/contactus');
    }
}
