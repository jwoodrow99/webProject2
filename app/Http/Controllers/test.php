<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Role;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class test extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $sendTos = [
            'jackwoodrow@protonmail.com',
            'jackwoodrow99@gmail.com',
            'jack.woodrow01@stclairconnect.ca'
        ];

        Mail::raw('TEST EMAIL!', function ($message) {
            $message->from('test@sandbox87c0d58c23e84c39a234d0af217dd384.mailgun.org', 'TEST');
            $message->to("jackwoodrow@protonmail.com");
        });

        Mail::raw('TEST EMAIL!', function ($message) {
            $message->from('test@sandbox87c0d58c23e84c39a234d0af217dd384.mailgun.org', 'TEST');
            $message->to('jackwoodrow99@gmail.com');
        });

        Mail::raw('TEST EMAIL!', function ($message) {
            $message->from('test@sandbox87c0d58c23e84c39a234d0af217dd384.mailgun.org', 'TEST');
            $message->to('jack.woodrow01@stclairconnect.ca');
        });

        echo "Mail Sent!";
    }
}
