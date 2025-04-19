<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAll()
    {
        return Customer::all();
    }

    public function getById(Customer $customer)
    {
        return $customer;
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function update(Customer $customer, array $data)
    {
        $customer->update($data);

        return $customer;
    }

    public function delete(Customer $customer)
    {
        return $customer->delete();
    }
}
