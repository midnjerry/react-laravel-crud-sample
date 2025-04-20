<?php

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\CustomerController;
use App\Services\CustomerService;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

// This TestCase is from PHPUnit - PURE PHP
class CustomerControllerTest extends TestCase 
{
    public function testGetAllReturnsJsonResponseWithCustomers(): void
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

         
    }
}