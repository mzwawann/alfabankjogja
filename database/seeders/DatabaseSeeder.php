<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Post::create([
        //     'title' => 'Judul artikel 1',
        //     'author_id' => 1,
        //     'Category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Defending champion Francesco Bagnaia won the inaugural sprint race in Portugal, ahead of Jorge Martín and Marc Márquez, and repeated the win in the main race.[5] At the second round in Argentina, KTM rider Brad Binder took the sprint win, while Marco Bezzecchi took his maiden premier class victory in a wet race. At the Grand Prix of the Americas, Bagnaia took his second sprint victory. Álex Rins stood atop the main race podium ahead of Luca Marini and Fabio Quartararo, marking the LCR Honda teams first win since Argentina 2018.[6]'
        // ]);

        $this->call([categorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}