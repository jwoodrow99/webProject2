<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['edit']);
        // Applies auth middleware to all functions except index
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->user()->authorizeRoles(['manager', 'employee', 'customer']);

        foreach (Customer::all() as $customer){
            echo "id: " . $customer->id . "</br>";
            echo "user_id: " . $customer->user_id . "</br>";
            echo "address: " . $customer->address . "</br>";
            echo "city: " . $customer->city . "</br>";
            echo "province: " . $customer->province . "</br>";
            echo "postal: " . $customer->postal . "</br>";
            echo "phone: " . $customer->phone . "</br>";
            echo "</br>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->customer == null){
            return view('customer.create');
        } else {
            return redirect('customer');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->customer == null){
            $customer = new Customer($request->all());
            $customer->user_id = $currentUser->id;
            $customer->save();
        }

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->id == $customer->user_id){
            $customer = Customer::find($customer)->first();
            return view('customer.show', compact("customer"));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->id == $customer->user_id){
            $customer = Customer::find($customer)->first();
            return view('customer.edit', compact('customer'));
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->id == $customer->user_id) {
            $formData = $request->all();
            $customer = Customer::find($customer)->first();
            $customer->update($formData);
            return redirect( 'customer');
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Request $request)
    {
        $request->user()->authorizeRoles(['manager', 'employee', 'customer']);
        $currentUser = Auth::user();

        if ($currentUser->id == $customer->user_id) {
            $customer->delete();
            return redirect( 'customer' );
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }
}
