<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\OrderConfirmed;
use App\Mail\OrderDeleted;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(["customer"]);

        // Get current user
        $currentUser = Auth::user();

        if ($currentUser) {
            $user_orders = Order::withTrashed()->where('user_id', $currentUser->id)->get();
            return view('order.index', compact("user_orders"));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(["customer"]);
        $currentUser = Auth::user();
        $cart = Cart::where('user_id', $currentUser->id)->get();

        $totalPrice = 0;

        foreach ($cart as $item){
            $totalPrice += ($item->quantity * $item->product->price);
        }

        $order = new Order();
        $order->user_id = $currentUser->id;
        $order->price = $totalPrice;
        $order->paid = false;
        $order->pickup_date = now(); // For testing pickup will be same day

        if ($order->products){
            $order->save();

            foreach ($cart as $item){
                $product = Product::findOrFail($item->product_id);
                if ($product->quantity >= $item->quantity){
                    $order->products()->attach($product, ["size" => $item->size, "quantity" => $item->quantity, "price" => $product->price*$item->quantity]);
                    $reducedAmmount = $product->ammount - $item->quantity;
                    $product->update(['quantity', $reducedAmmount]);
                }
            }

            Cart::where('user_id', $currentUser->id)->delete();
            Mail::to($request->user())->send(new OrderConfirmed($order));
        }

        return redirect('order');
    }

    public function reorder(Request $request, $id){
        $request->user()->authorizeRoles(["customer"]);
        $order = Order::findOrFail($id);
        $currentUser = Auth::user();

        foreach ($order->products as $product){
            if ($product->pivot->quantity <= $product->quantity){
                $cartItem = new Cart();
                $cartItem->user_id = $currentUser->id;
                $cartItem->product_id = $product->pivot->product_id;
                $cartItem->quantity = $product->pivot->quantity;
                $cartItem->size = $product->pivot->size;
                $cartItem->save();
            }
        }

        return redirect('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(["customer", "employee", "manager"]);

        // Get current user
        $currentUser = Auth::user();
        $order = Order::withTrashed()->findOrFail($id);

        if ($currentUser->id == $order->user_id || Auth::user()->hasRole('manager')) {
            return view('order.show', compact("order"));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();
        $order = Order::findOrFail($id);
        $user = User::findOrFail($order->user_id);

        if (($currentUser->id == $order->user_id || Auth::user()->hasRole('manager')) && $order->paid == false && $order->pickup_date >= now()->toDateString() && $order->picked_up == false) {
            $order->delete();
            Mail::to($user)->send(new OrderDeleted($order));
            if (Auth::user()->hasRole('manager')){
                return redirect('admin');
            } else {
                return redirect( 'order' );
            }
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    public function showDeleted(){
        $orders = Order::onlyTrashed()->get();
        return view('admin.orders', compact('orders'));
    }

    public function restore($order){
        Order::onlyTrashed()->where('id', $order)->restore();
        Order::findOrFail($order)->product()->restore();
        return redirect('order');
    }

    public function forceDelete($order){
        Order::onlyTrashed()->where('id', $order)->forceDelete();
        return redirect('order');
    }
}
