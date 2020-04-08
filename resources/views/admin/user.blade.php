@extends('layouts.admin')
<link href="{{ asset('css/admin/admin.user.css') }}" rel="stylesheet">
@section('content2')
    <div class="user-container">
        <h2>All Users</h2>
        <div class="heading-container">
            <div class="user-heading">
{{--                <span class="heading"> Id</span>--}}
                <span class="heading"> Name</span>
                <span class="heading"> Email</span>
                <span class="heading"> Phone</span>
                <span class="heading"> Details</span>
                <span class="heading"> Manager</span>
                <span class="heading"> Employee</span>
            </div>
        </div>
        <div class="user-list">
        @foreach($customers as $customer)
            <div class="user">
{{--                <span class="user-item"> {{$customer->user->id}}</span>--}}
                <span class="user-item"> {{$customer->name}}</span>
                <span class="user-item"> {{$customer->user->email}}</span>
                <span class="user-item"> {{$customer->phone}}</span>

                    <span class="user-item"> <a href="{{ action('CustomerController@show', $customer->id) }}"><button class="view-user-btn"> View User</button></a></span>

                    @if($customer->user->hasRole('manager'))
                        <span class="user-item">
                            <form method="POST" action="{{ action('AdminController@removeRole', $customer->user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="role" value="manager">
                                <input type="submit" value="Remove Manager" class="rmv-role-btn">
                            </form>
                        </span>
                    @else
                        <span class="user-item">
                            <form method="POST" action="{{ action('AdminController@addRole', $customer->user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="role" value="manager">
                                <input type="submit" value="Add Manager" class="add-role-btn">
                            </form>
                        </span>
                    @endif

                    @if($customer->user->hasRole('employee'))
                        <span class="user-item">
                            <form method="POST" action="{{ action('AdminController@removeRole', $customer->user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="role" value="employee">
                                <input type="submit" value="Remove Employee" class="rmv-role-btn">
                            </form>
                        </span>
                    @else
                        <span class="user-item">
                            <form method="POST" action="{{ action('AdminController@addRole', $customer->user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="role" value="employee">
                                <input type="submit" value="Add Employee" class="add-role-btn">
                            </form>
                        </span>
                    @endif
                    <span class="user-item">
                        <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete User" class="del-usr-btn">
                        </form>
                    </span>
            </div>
        @endforeach
        </div>
    </div>
@endsection
