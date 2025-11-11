<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'user_id' => 1, 
            'name' => 'Comida',
            'type' => 'expense',
        ]);
    }
}