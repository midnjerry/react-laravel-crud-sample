<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * End-to-end Test example
 */
class CustomerControllerFullIntegrationTest extends TestCase
{
    // resets database before every test
    use RefreshDatabase;

    /**
     * Inside the Feature folder, the Laravel framework is loaded allowing testing
     * of integrated components.  This allows end-to-end testing.
     *
     * These type of tests are imported by `use Tests\TestCase`
     */
    public function test_get_all_endpoint_is_mapped_correctly(): void
    {
        Customer::insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'date_of_birth' => '1990-01-01',
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '1980-01-01',
            ],
        ]);

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
