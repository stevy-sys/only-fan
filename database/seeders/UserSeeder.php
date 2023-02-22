<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customers();
        $customer->name = 'only-fan admin';
        $customer->email = 'admin@only-fan2.com';
        $customer->password = bcrypt('test1234');
        $customer->save();
    }
}
