<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Services\CustomerService;
use Tests\TestCase;

/**
 * Test written using Laravel framework but using a mock dependency
 */
class CustomerControllerIntegrationWithMockServiceTest extends TestCase
{
    /**
     * Inside the Feature folder, the Laravel framework is loaded allowing testing
     * of integrated components.  This includes use of a Laravel-based mocking implementation
     * and also allows very easy http calls to the controller.
     *
     * These type of tests are imported by `use Tests\TestCase`
     */
    public function test_get_all_endpoint_is_mapped_correctly(): void
    {

        $expectedCustomers = collect([
            new Customer([
                'id' => 1,
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'date_of_birth' => '1990-01-01',
            ]),
            new Customer([
                'id' => 2,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '1980-01-01',
            ]),
        ]);

        // This is a Laravel version of mock.  It asserts that the method is called once.
        $this->mock(CustomerService::class, function ($mock) use ($expectedCustomers) {
            $mock->shouldReceive('getAll')->once()->andReturn($expectedCustomers);
        });

        // getJson represents an HTTP call to server - Laravel-based
        $response = $this->getJson('/api/customers');

        // Dump output and die
        // dd($response->json());

        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonFragment(['first_name' => 'Alice'])
            ->assertJsonFragment(['first_name' => 'John']);

    }
}
