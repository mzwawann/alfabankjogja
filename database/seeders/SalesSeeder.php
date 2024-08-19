<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->insert([
            ['month' => 'Januari', 'amount' => 90],
            ['month' => 'Februari', 'amount' => 200],
            ['month' => 'Maret', 'amount' => 250],
            ['month' => 'April', 'amount' => 300],
        ]);
    }
}
