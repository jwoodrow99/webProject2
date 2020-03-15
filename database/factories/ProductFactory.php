<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
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
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_code' => $faker->regexify('[A-Z0-9]{6}'),
        'name' => "product-" . $faker->word,
        'description' => $faker->paragraph,
        'quantity' => $faker->regexify('[0-9]{2}'),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50),
        'image' => "https://via.placeholder.com/150",
    ];
});
