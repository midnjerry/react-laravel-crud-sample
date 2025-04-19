<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $service)
    {
        $this->customerService = $service;
    }

    public function index()
    {
        return response()->json($this->customerService->getAll());
    }

    public function getById(Customer $customer)
    {
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
