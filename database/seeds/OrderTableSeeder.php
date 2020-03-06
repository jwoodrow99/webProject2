<?php

use App\Order;
use App\User;
use App\Product;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $faker = Faker\Factory::create();

        $user1 = User::where("email", "customer@example.com")->first();

        $product = [
            Product::where("product_code", "000001")->first(),
            Product::where("product_code", "000002")->first(),
            Product::where("product_code", "000003")->first()
        ];

        // Create order
        $order1 = new Order();
        $order1->user_id = $user1->id;
        $order1->price = 30.00;
        $order1->paid = false;
        $order1->pickup_date = $faker->dateTime();
        $order1->save();
        $order1->products()->attach($product[1], ["size" => 01, "quantity" => 01]);
        $order1->products()->attach($product[2], ["size" => 01, "quantity" => 01]);

        // Create order
        $order1 = new Order();
        $order1->user_id = $user1->id;
        $order1->price = 30.00;
        $order1->paid = false;
        $order1->pickup_date = $faker->dateTime();
        $order1->save();
        $order1->products()->attach($product[0], ["size" => 01, "quantity" => 03]);

        // Create order
        $order1 = new Order();
        $order1->user_id = $user1->id;
        $order1->price = 70.00;
        $order1->paid = false;
        $order1->pickup_date = $faker->dateTime();
        $order1->save();
        $order1->products()->attach($product[0], ["size" => 01, "quantity" => 01]);
        $order1->products()->attach($product[2], ["size" => 01, "quantity" => 02]);
    }
}
