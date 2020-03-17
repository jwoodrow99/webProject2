@extends('layouts.admin')

@section('content2')
    <table>

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Details</th>
            <th>Manager</th>
            <th>Employee</th>
        </tr>

        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->user->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->user->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>
                    <a href="{{ action('CustomerController@show', $customer->id) }}">VIEW</a>
                </td>

                <td>
                    @if($customer->user->hasRole('manager'))
                        <form method="POST" action="{{ action('AdminController@removeRole', $customer->user->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="role" value="manager">
                            <input type="submit" value="REMOVE">
                        </form>
                    @else
                        <form method="POST" action="{{ action('AdminController@addRole', $customer->user->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="role" value="manager">
                            <input type="submit" value="ADD">
                        </form>
                    @endif
                </td>

                <td>
                    @if($customer->user->hasRole('employee'))
                        <form method="POST" action="{{ action('AdminController@removeRole', $customer->user->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="role" value="employee">
                            <input type="submit" value="REMOVE">
                        </form>
                    @else
                        <form method="POST" action="{{ action('AdminController@addRole', $customer->user->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="role" value="employee">
                            <input type="submit" value="ADD">
                        </form>
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" value="[DELETE]">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
