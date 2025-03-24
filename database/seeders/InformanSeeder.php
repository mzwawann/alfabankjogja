<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformanSeeder extends Seeder
{
    public function run()
    {
        DB::table('informan')->insert([
            ['month' => 'January', 'amount' => 800],
            ['month' => 'February', 'amount' => 900],
            ['month' => 'March', 'amount' => 850],
        ]);
    }
}
