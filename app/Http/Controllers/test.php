<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class test extends Controller
{

    public function __construct()
    {
        // This line allows for the use of the auth middlewear,
        // middlewear is implemented in route file.
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Allows for role authorization on specific methods
        // $request->user()->authorizeRoles(['employee', 'manager']);
        // $request->user()->authorizeRoles(["manager"]);

        $userCustomer = User::where("email", "customer@example.com")->first()->orders()->first();
        dd($userCustomer);
    }
}
