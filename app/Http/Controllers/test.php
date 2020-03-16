<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Role;
use App\Order;
use Illuminate\Support\Facades\Auth;


class test extends Controller
{

    public function __construct()
    {
        // This line allows for the use of the auth middlewear,
        // middlewear is implemented in route file.
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(["customer"]);

        // Get current user
        $currentUser = Auth::user();

        if ($currentUser) {
            $user_orders = $currentUser->orders;
            return view('test', compact("user_orders"));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }
}
