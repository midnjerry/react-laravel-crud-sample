<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $service)
    {
        $this->customerService = $service;
    }

    public function getAll()
    {
        // `response()` is the Laravel utility function that packages responses
        // If you use this, you cannot execute PHPUnit tests with pure PHP logic
        // This requires integration tests which could increase time-to-test
        
        // return response()->json($this->customerService->getAll());

        // Instead we can use JsonResponse which `response()` uses under the hood.
        // This seems hacky.
        $customers = $this->customerService->getAll();
        return new JsonResponse($customers, 200);
    }

    public function getById(Customer $customer)
    {
        // "Laravel way" of returning an object
        // This makes this method incompatible with pure PHP unit tests.
        return response()->json($this->customerService->getById($customer));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);

        $customer = $this->customerService->create($data);

        return response()->json($customer, 201);
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);

        $updated = $this->customerService->update($customer, $data);

        return response()->json($updated);
    }

    public function partialUpdate(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'first_name' => 'sometimes|required|string',
            'last_name' => 'sometimes|required|string',
            'date_of_birth' => 'sometimes|required|date',
        ]);

        $updated = $this->customerService->update($customer, $data);

        return response()->json($updated);
    }

    public function destroy(Customer $customer)
    {
        $this->customerService->delete($customer);

        return response()->json(null, 204);
    }
}
