<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            ['id' => 1, 'name' => 'Ana Reyes', 'email' => 'ana.reyes@example.com', 'phone' => '0917 000 1001', 'address' => 'Quezon City', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Miguel Santos', 'email' => 'miguel.santos@example.com', 'phone' => '0917 000 1002', 'address' => 'Manila', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Bea Cruz', 'email' => 'bea.cruz@example.com', 'phone' => '0917 000 1003', 'address' => 'Pasig City', 'status' => 'Inactive'],
            ['id' => 4, 'name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0917 000 1004', 'address' => 'Makati City', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Nina Flores', 'email' => 'nina.flores@example.com', 'phone' => '0917 000 1005', 'address' => 'Marikina City', 'status' => 'Active'],
        ];

        return view('customers.index', compact('customers'));
    }
}
