<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use App\Services\CustomerService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

// This TestCase is from PHPUnit - PURE PHP
class CustomerControllerTest extends TestCase
{
    public function test_get_all_returns_json_response_with_customers(): void
    {
        // Create a mock of the CustomerService using pure PHP
        $serviceMock = $this->createMock(CustomerService::class);

        // Define the expected customers
        $expectedCustomers = [
            new Customer(['id' => 1, 'first_name' => 'Alice', 'last_name' => 'Smith']),
            new Customer(['id' => 2, 'first_name' => 'John', 'last_name' => 'Doe']),
        ];

        // Set up the expectation for the getAll method
        $serviceMock->expects($this->once())
            ->method('getAll')
            ->willReturn($expectedCustomers);

        // Manually inject mock into CustomerController
        $controller = new CustomerController($serviceMock);
        $response = $controller->getAll();

        // Verify that the response is a JsonResponse with the expected data
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(json_encode($expectedCustomers), $response->getContent());
    }
}
