<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OmsetSeeder extends Seeder
{
    public function run()
    {
        DB::table('omset')->insert([
            ['month' => 'January', 'amount' => 1500],
            ['month' => 'February', 'amount' => 1300],
            ['month' => 'March', 'amount' => 1400],
        ]);
    }
}
