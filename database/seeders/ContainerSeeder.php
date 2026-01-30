<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Container;
use App\Models\Category;

class ContainerSeeder extends Seeder
{
    public function run(): void
    {
        $office = Category::where('name', 'Office Spaces')->first();
        $home = Category::where('name', 'Container Homes')->first();
        $commercial = Category::where('name', 'Commercial')->first();

        Container::create([
            'category_id' => $office->id,
            'name' => 'Home Office Pro',
            'description' => 'Compact modular office ideal for remote work.',
            'type' => 'oficina',
            'stock' => 5,
            'price' => 38000,
            'image' => 'foto3.jpg'
        ]);

        Container::create([
            'category_id' => $office->id,
            'name' => 'Startup Hub',
            'description' => 'Modular workspace for small teams.',
            'type' => 'oficina',
            'stock' => 3,
            'price' => 68000,
            'image' => 'foto3.jpg'
        ]);

        Container::create([
            'category_id' => $home->id,
            'name' => 'Compact Living Module',
            'description' => 'Sustainable container home for modern living.',
            'type' => 'vivienda',
            'stock' => 4,
            'price' => 72000,
            'image' => 'foto3.jpg'
        ]);

        Container::create([
    'category_id' => $commercial->id,
    'name' => 'Retail Pop-Up',
    'description' => 'Commercial container ideal for temporary shops.',
    'type' => 'otro',
    'stock' => 2,
    'price' => 56000,
    'image' => 'foto3.jpg'
]);
    }
}
