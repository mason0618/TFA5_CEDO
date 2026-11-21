<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeders_create_the_sample_accounts_without_duplicates(): void
    {
        $this->seed();
        $this->seed();

        $this->assertDatabaseCount('customers', 5);
        $this->assertDatabaseCount('users', 5);
        $this->assertDatabaseHas('customers', ['email' => 'bea.cruz@example.com', 'status' => 'Inactive']);
        $this->assertDatabaseHas('users', ['email' => 'marco@example.com', 'role' => 'Administrator']);
        $this->assertSame(4, Customer::where('status', 'Active')->count());
        $this->assertSame(4, User::where('status', 'Active')->count());

        $customers = $this->get('/customers')->viewData('customers');
        $users = $this->get('/users')->viewData('users');

        foreach ($customers as $customer) {
            $this->assertDatabaseHas('customers', $customer);
        }

        foreach ($users as $user) {
            $this->assertDatabaseHas('users', $user);
        }
    }
}
