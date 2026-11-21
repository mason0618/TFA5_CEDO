<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Marco Dela Cruz', 'email' => 'marco@example.com', 'role' => 'Administrator', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Jessa Ramos', 'email' => 'jessa@example.com', 'role' => 'Manager', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Carlo Mendoza', 'email' => 'carlo@example.com', 'role' => 'Cashier', 'status' => 'Active'],
            ['id' => 4, 'name' => 'Lara Aquino', 'email' => 'lara@example.com', 'role' => 'Cashier', 'status' => 'Inactive'],
            ['id' => 5, 'name' => 'Rico Navarro', 'email' => 'rico@example.com', 'role' => 'Stock Clerk', 'status' => 'Active'],
        ];

        return view('users.index', compact('users'));
    }
}
