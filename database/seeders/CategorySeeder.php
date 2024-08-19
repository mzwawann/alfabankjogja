<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();

        Category::create([
            'name' => 'Web Design',
            'slug' => 'Web-Design',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'UI-UX',
            'color' => 'green'
        ]);
        
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'Machine-Learning',
            'color' => 'blue'
        ]);
        
        Category::create([
            'name' => 'BackEnd Developer',
            'slug' => 'BackEnd-Developer',
            'color' => 'yellow'
        ]);
        
        Category::create([
            'name' => 'FrontEnd Developer',
            'slug' => 'FrontEnd Developer',
            'color' => 'cyan'
        ]);
    }
}
