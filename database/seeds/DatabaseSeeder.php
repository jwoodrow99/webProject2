<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Seed Roles
        $this->call(RoleTableSeeder::class);
        // Seed Product
        $this->call(ProductTableSeeder::class);
        // Seed Users
        $this->call(UserTableSeeder::class);
    }
}
