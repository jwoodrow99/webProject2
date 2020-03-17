<?php

namespace App\Http\Controllers;

// All frameworks
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// All models
use App\Customer;
use App\Order;
use App\Product;
use App\Role;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        // Auth middleware
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['manager']);
        $products = Product::all();
        $orders = Order::where('pickup_date', today())->where('picked_up', false)->get();
        return view('admin.index', compact('products', 'orders'));
    }

    public function addStock(Request $request, $id){
        $request->user()->authorizeRoles(['manager']);
        $product = Product::findOrFail($id);
        $product->update(['quantity' => $product->quantity + 1]);
        return redirect('admin');
    }

    public function removeStock(Request $request, $id){
        $request->user()->authorizeRoles(['manager']);
        $product = Product::findOrFail($id);
        $product->update(['quantity' => $product->quantity - 1]);
        return redirect('admin');
    }

    public function pickedUp(Request $request, $id){
        $request->user()->authorizeRoles(['manager']);
        $order = Order::findOrFail($id);
        $order->update(['picked_up' => true]);
        return redirect('admin');
    }

    public function orders(Request $request){
        $request->user()->authorizeRoles(['manager']);
        $orders = Order::all();
        $trashedOrders = Order::onlyTrashed()->get();
        return view('admin.orders', compact('orders', 'trashedOrders'));
    }

    public function user(Request $request){
        $request->user()->authorizeRoles(['manager']);
        $customers = Customer::all();
        return view('admin.user', compact('customers'));
    }

    public function addRole(Request $request, $id){
        $request->user()->authorizeRoles(['manager']);
        $role = Role::where("name", $request->role)->first();
        $user = User::findOrFail($id);
        $user->roles()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
        return redirect('admin/user');
    }

    public function removeRole(Request $request, $id){
        $request->user()->authorizeRoles(['manager']);
        $role = Role::where("name", $request->role)->first();
        $user = User::findOrFail($id);
        $user->roles()->detach($role);
        return redirect('admin/user');
    }
}
