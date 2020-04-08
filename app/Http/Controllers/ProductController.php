<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['edit']);
        // Applies auth middleware to all functions except index
        $this->middleware('verified')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['manager']);
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['manager']);

        $product = new Product($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $path = $request->image->storePublicly('product', 'public');
            $product->image = $path;
            $product->save();
        }

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['manager']);

        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
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
        $request->user()->authorizeRoles(['manager']);
        $product = Product::findOrFail($id);

        $product->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $path = $request->image->storePublicly('product', 'public');
            $product->update(['image' => $path]);
        }

        return view('product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['manager']);
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('admin');
    }
}
