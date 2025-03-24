<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingSeeder extends Seeder
{
    public function run()
    {
        DB::table('marketing')->insert([
            ['month' => 'January', 'sales' => 120],
            ['month' => 'February', 'sales' => 150],
            ['month' => 'March', 'sales' => 180],
            ['month' => 'April', 'sales' => 220],
            ['month' => 'May', 'sales' => 300],
            ['month' => 'June', 'sales' => 400],
            ['month' => 'July', 'sales' => 350],
            ['month' => 'August', 'sales' => 450],
            ['month' => 'September', 'sales' => 500],
            ['month' => 'October', 'sales' => 600],
            ['month' => 'November', 'sales' => 650],
            ['month' => 'December', 'sales' => 700],
        ]);
    }
}
