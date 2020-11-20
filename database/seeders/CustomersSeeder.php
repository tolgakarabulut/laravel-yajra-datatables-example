<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::factory()->count(500 )->create();
    }
}
