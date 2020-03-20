<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['edit']);
        // Applies auth middleware to all functions except index
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['customer']);
        $currentUser = Auth::user();

        $cart = $currentUser->carts;
        $totalPrice = 0;

        foreach ($currentUser->carts as $item){
            $totalPrice += $item->product->price * $item->quantity;
        }

        return view('cart.index', compact('cart', 'totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout.create', compact('cart', 'totalPrice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['customer']);
        $currentUser = Auth::user();

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity >= $request->quantity){
            $cartItem = new Cart();
            $cartItem->user_id = $currentUser->id;
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $request->quantity;
            $cartItem->size = $request->size;
            $cartItem->save();
        }

        return redirect('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['customer']);
        $currentUser = Auth::user();
        $cart = Cart::findOrFail($id);

        if ($currentUser->id == $cart->user_id){
            return view('cart.edit', compact('cart'));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->user()->authorizeRoles(['customer']);
        $currentUser = Auth::user();
        $formData = $request->all();

        if ($currentUser->id == $cart->user_id){

            $product = Product::findOrFail($cart->product_id);

            if ($formData["quantity"] <= $product->quantity) {
                $cart->size = $formData["size"];
                $cart->quantity = $formData["quantity"];
                $cart->save();
            }

            return redirect('cart');

        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Request $request)
    {
        $request->user()->authorizeRoles(['customer']);
        $currentUser = Auth::user();

        if ($currentUser->id == $cart->user_id) {
            $cart->delete();
            return redirect( 'cart' );
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }
}
