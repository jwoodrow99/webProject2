<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
//use PayPalCheckoutSdk\Core\ProductionEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient extends Model
{
    public static function client() {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_SECRET');

        return new SandboxEnvironment($clientId, $clientSecret);
//        return new ProductionEnvironment($clientId, $clientSecret);
    }
}
