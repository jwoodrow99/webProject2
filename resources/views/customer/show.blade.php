
@extends('layouts.app')
<link href="{{ asset('css/customer/customer.show.css') }}" rel="stylesheet">
@section('content')
    <h1>User Information</h1>
    <div class="usr-info-container">
        <div class="usr-info">
            <span class="field-title">
                User Id:<br/>
                Name:<br/>
                Address:<br/>
                City:<br/>
                Province:<br/>
                Postal:<br/>
                Phone:<br/>
                Newsletter:<br/>
            </span>
            <span class="usr-data">
                {{ $customer->user_id  }}<br/>
                {{ $customer->name  }}<br/>
                {{ $customer->address  }}<br/>
                {{ $customer->city  }}<br/>
                {{ $customer->province  }}<br/>
                {{ $customer->postal  }}<br/>
                {{ $customer->phone  }}<br/>
                {{ $customer->user->newsletter ? 'Subscribed' : 'Not Subscribed' }}<br/>
            </span>
        </div>

        <a href="{{ action('CustomerController@edit', $customer->id) }}"><button>Edit</button></a>

        @if(!Auth::user()->hasRole('manager'))
            <a href="{{ action('OrderController@index', $customer->id) }}"><button>View Orders</button></a>
        @else
            <a href="{{ action('AdminController@orders') }}"><button>View Orders</button></a>
        @endif

        <p>You can only delete an account if there isn't any open orders!</p>
        <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete User">
        </form>
    </div>
@endsection
