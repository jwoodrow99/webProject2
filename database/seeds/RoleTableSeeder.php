<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create manager role
        $role_manager = new Role();
        $role_manager->name = "manager";
        $role_manager->description = "Role for the super user (Admin features)";
        $role_manager->save();

        // Create employee role
        $role_employee = new Role();
        $role_employee->name = "employee";
        $role_employee->description = "Role for employee (operational features)";
        $role_employee->save();

        // Create customer role
        $role_manager = new Role();
        $role_manager->name = "customer";
        $role_manager->description = "Role for general customers (purchasing and account management)";
        $role_manager->save();
    }
}
