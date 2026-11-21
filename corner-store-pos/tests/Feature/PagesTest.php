<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_all_four_pages_have_working_navigation(): void
    {
        $pages = [
            '/' => 'Home',
            '/about' => 'About',
            '/customers' => 'Customer Accounts',
            '/users' => 'User Accounts',
        ];

        foreach ($pages as $path => $title) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertSee('<title>'.$title.' | Corner Store POS</title>', false);

            foreach (array_keys($pages) as $destination) {
                $response->assertSee('href="'.url($destination).'"', false);
            }
        }
    }

    public function test_customers_are_rendered_from_the_static_array(): void
    {
        $this->app['config']->set('database.default', 'unavailable');

        $response = $this->get('/customers');

        $response->assertOk()
            ->assertViewHas('customers', fn ($customers) => count($customers) >= 5)
            ->assertSeeInOrder(['Ana Reyes', 'Miguel Santos', 'Bea Cruz', 'Paolo Garcia', 'Nina Flores'])
            ->assertSee('C001')
            ->assertSee('C005')
            ->assertSee('Inactive');

        $this->assertSame(5, substr_count($response->getContent(), '<th scope="row">'));
    }

    public function test_users_are_rendered_from_the_static_array(): void
    {
        $this->app['config']->set('database.default', 'unavailable');

        $response = $this->get('/users');

        $response->assertOk()
            ->assertViewHas('users', fn ($users) => count($users) >= 5)
            ->assertSeeInOrder(['Marco Dela Cruz', 'Jessa Ramos', 'Carlo Mendoza', 'Lara Aquino', 'Rico Navarro'])
            ->assertSee('Administrator')
            ->assertSee('Stock Clerk')
            ->assertSee('U005');

        $this->assertSame(5, substr_count($response->getContent(), '<th scope="row">'));
    }
}
