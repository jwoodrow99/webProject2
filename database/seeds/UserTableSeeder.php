<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Product;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get roles from roles table
        $roles = [
            "manager" => Role::where("name", "manager")->first(),
            "employee" => Role::where("name", "employee")->first(),
            "customer" => Role::where("name", "customer")->first()
        ];

        // Manager Factory
        factory(App\User::class, 5)->create()->each(function ($user) {
            $rolec = Role::where("name", "customer")->first();
            $role = Role::where("name", "manager")->first();
            $user->roles()->attach($rolec, ['created_at' => now(), 'updated_at' => now()]);
            $user->roles()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
            $user->customer()->save(factory(App\Customer::class)->make());
        });

        // Employee Factory
        factory(App\User::class, 10)->create()->each(function ($user) {
            $rolec = Role::where("name", "customer")->first();
            $role = Role::where("name", "employee")->first();
            $user->roles()->attach($rolec, ['created_at' => now(), 'updated_at' => now()]);
            $user->roles()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
            $user->customer()->save(factory(App\Customer::class)->make());
        });

        // customer Factory
        factory(App\User::class, 50)->create()->each(function ($user) {
            $role = Role::where("name", "customer")->first();
            $user->roles()->attach($role, ['created_at' => now(), 'updated_at' => now()]);
            $user->customer()->save(factory(App\Customer::class)->make());
            for ($i = 0; $i < rand(0,4); $i++){
                $user->orders()->save(factory(App\Order::class)->make(["user_id" => $user->id]))->products()->attach([
                    Product::find(1)->id => ["size" => 01, "quantity" => 01, "price" => 01],
                    Product::find(2)->id => ["size" => 01, "quantity" => 01, "price" => 01]
                ]);
            }
        });

        // Create test user with manager role
        // Username: manager@example.com
        // Password: secret
        $userManager = new User();
        $userManager->name = "Manager Name";
        $userManager->email = "manager@example.com";
        $userManager->password = bcrypt("secret");
        $userManager->email_verified_at = now();
        $userManager->remember_token = Str::random(10);
        $userManager->save();
        $userManager->roles()->attach($roles["manager"], ['created_at' => now(), 'updated_at' => now()]);
        $userManager->customer()->save(factory(App\Customer::class)->make());

        // Create test user with employee role
        // Username: employee@example.com
        // Password: secret
        $userEmployee = new User();
        $userEmployee->name = "Employee Name";
        $userEmployee->email = "employee@example.com";
        $userEmployee->password = bcrypt("secret");
        $userEmployee->email_verified_at = now();
        $userEmployee->remember_token = Str::random(10);
        $userEmployee->save();
        $userEmployee->roles()->attach($roles["employee"], ['created_at' => now(), 'updated_at' => now()]);
        $userEmployee->customer()->save(factory(App\Customer::class)->make());

        // Create test user with customer role
        // Username: customer@example.com
        // Password: secret
        $userCustomer = new User();
        $userCustomer->name = "Customer Name";
        $userCustomer->email = "customer@example.com";
        $userCustomer->password = bcrypt("secret");
        $userCustomer->email_verified_at = now();
        $userCustomer->remember_token = Str::random(10);
        $userCustomer->save();
        $userCustomer->roles()->attach($roles["customer"], ['created_at' => now(), 'updated_at' => now()]);
        $userCustomer->customer()->save(factory(App\Customer::class)->make());

    }
}
