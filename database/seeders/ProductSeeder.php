<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 15 ; $i++) { 
            Product::create([
                'name' => fake()->word(4),
                'price' => rand(1,200),
                'description' => fake()->text(10),
                'media' => fake()->imageUrl,
                'active' => 1
            ]);
        }
    }
}
