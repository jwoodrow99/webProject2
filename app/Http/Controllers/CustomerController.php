<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['edit']);
        // Applies auth middleware to all functions except index
        $this->middleware('verified');
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
        $customer = Customer::where('user_id', $currentUser->id)->first();
        return view('customer.index', compact('customer'));
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
            $customer->name = $currentUser->name;
            $currentUser->customer()->save($customer);
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

        if ($currentUser->id == $customer->user_id || Auth::user()->hasRole('manager')){
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

        if ($currentUser->id == $customer->user_id || Auth::user()->hasRole('manager')){
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

        if ($currentUser->id == $customer->user_id || Auth::user()->hasRole('manager')) {
            $formData = $request->all();
            $customer = Customer::find($customer)->first();
            $customer->update($formData);
            $customer->user->update(['email' => $formData['email'], 'name' => $formData['name']]);
            if (Auth::user()->hasRole('manager')){
                return redirect('customer/' . $customer->id);
            } else {
                return redirect( 'customer');
            }
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

        $openOrders = false;

        foreach ($currentUser->orders as $order){
            if ($order->picked_up == false){
                $openOrders = true;
            }
        }

        if (($currentUser->id == $customer->user_id || Auth::user()->hasRole('manager')) && !$openOrders) {
            $user = User::findOrFail($customer->user_id);
            $user->delete();
            $customer->delete();
            if (Auth::user()->hasRole('manager')){
                return redirect('admin/user');
            } else {
                return redirect( 'customer');
            }
        } else {
            abort(401, 'This action is unauthorized.');
        }
    }
}
