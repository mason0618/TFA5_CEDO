<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com', 'phone' => '0917 000 1001', 'address' => 'Quezon City', 'status' => 'Active'],
            ['name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0917 000 1002', 'address' => 'Manila', 'status' => 'Active'],
            ['name' => 'Bea Cruz', 'email' => 'bea.cruz@example.com', 'phone' => '0917 000 1003', 'address' => 'Pasig City', 'status' => 'Inactive'],
            ['name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0917 000 1004', 'address' => 'Makati City', 'status' => 'Active'],
            ['name' => 'Nina Flores', 'email' => 'nina.flores@example.com', 'phone' => '0917 000 1005', 'address' => 'Marikina City', 'status' => 'Active'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(['email' => $customer['email']], $customer);
        }
    }
}
