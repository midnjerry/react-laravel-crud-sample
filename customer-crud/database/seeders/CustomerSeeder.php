<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'date_of_birth' => '1990-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson',
                'date_of_birth' => '1985-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Charlie',
                'last_name' => 'Brown',
                'date_of_birth' => '1979-12-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
