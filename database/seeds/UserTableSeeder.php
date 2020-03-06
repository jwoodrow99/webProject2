<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Customer;

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
        $role_manager  = Role::where("name", "manager")->first();
        $role_employee = Role::where("name", "employee")->first();
        $role_customer  = Role::where("name", "customer")->first();

        // Create test user with manager role
        // Username: manager@example.com
        // Password: secret
        $userManager = new User();
        $userManager->name = "Manager Name";
        $userManager->email = "manager@example.com";
        $userManager->password = bcrypt("secret");
        $userManager->save();
        $userManager->roles()->attach($role_manager);

        // Create test user with employee role
        // Username: employee@example.com
        // Password: secret
        $userEmployee = new User();
        $userEmployee->name = "Employee Name";
        $userEmployee->email = "employee@example.com";
        $userEmployee->password = bcrypt("secret");
        $userEmployee->save();
        $userEmployee->roles()->attach($role_employee);

        // Create test user with customer role
        // Username: customer@example.com
        // Password: secret
        $userCustomer = new User();
        $userCustomer->name = "Customer Name";
        $userCustomer->email = "customer@example.com";
        $userCustomer->password = bcrypt("secret");
        $userCustomer->save();
        $userCustomer->roles()->attach($role_customer);

        // $userCustomer = User::where("email", "customer@example.com")->first();

        $customer = new Customer();
        $customer->user_id = $userCustomer->id;
        $customer->name = $userCustomer->name;
        $customer->address = "0000 example drive.";
        $customer->city = "example city";
        $customer->province = "example province";
        $customer->postal = "A0A0A0";
        $customer->phone = "0000000000";
        $customer->save();
        // $customer->user()->attach($userCustomer);
    }
}
