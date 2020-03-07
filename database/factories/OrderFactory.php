<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Order;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|

// Create order
        $order1 = new Order();
        $order1->user_id = $user1->id;
        $order1->price = 30.00;
        $order1->paid = false;
        $order1->pickup_date = $faker->dateTime();
        $order1->save();
        $order1->products()->attach($product[1], ["size" => 01, "quantity" => 01]);
        $order1->products()->attach($product[2], ["size" => 01, "quantity" => 01]);

*/

$factory->define(Order::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50),
        'paid' => $faker->boolean,
        'pickup_date' => $faker->dateTime,
    ];
});
