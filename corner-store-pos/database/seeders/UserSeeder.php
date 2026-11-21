<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Marco Dela Cruz', 'email' => 'marco@example.com', 'role' => 'Administrator', 'status' => 'Active'],
            ['name' => 'Jessa Ramos', 'email' => 'jessa@example.com', 'role' => 'Manager', 'status' => 'Active'],
            ['name' => 'Carlo Mendoza', 'email' => 'carlo@example.com', 'role' => 'Cashier', 'status' => 'Active'],
            ['name' => 'Lara Aquino', 'email' => 'lara@example.com', 'role' => 'Cashier', 'status' => 'Inactive'],
            ['name' => 'Rico Navarro', 'email' => 'rico@example.com', 'role' => 'Stock Clerk', 'status' => 'Active'],
        ];

        foreach ($users as $record) {
            $user = User::firstOrNew(['email' => $record['email']]);
            $user->fill($record);

            if (! $user->exists) {
                $user->password = Str::random(40);
            }

            $user->save();
        }
    }
}
