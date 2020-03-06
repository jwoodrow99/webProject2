<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create product
        $product1 = new Product();
        $product1->product_code = "000001";
        $product1->name = "prod1";
        $product1->description = "product 1";
        $product1->quantity = 10;
        $product1->price = 10.00;
        $product1->image = "placeholder";
        $product1->save();

        // Create product
        $product2 = new Product();
        $product2->product_code = "000002";
        $product2->name = "prod2";
        $product2->description = "product 2";
        $product2->quantity = 20;
        $product2->price = 20.00;
        $product2->image = "placeholder";
        $product2->save();

        // Create product
        $product3 = new Product();
        $product3->product_code = "000003";
        $product3->name = "prod3";
        $product3->description = "product 3";
        $product3->quantity = 30;
        $product3->price = 30.00;
        $product3->image = "placeholder";
        $product3->save();
    }
}
