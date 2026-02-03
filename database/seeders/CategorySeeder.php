<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Office Spaces']);
        Category::create(['name' => 'Container Homes']);
        Category::create(['name' => 'Commercial']);
    }
}
