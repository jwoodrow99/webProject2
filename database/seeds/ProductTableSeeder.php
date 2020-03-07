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

        // customer Factory
        factory(App\Product::class, 10)->create()->each(function ($product) {
            $product->save();
        });
    }
}
