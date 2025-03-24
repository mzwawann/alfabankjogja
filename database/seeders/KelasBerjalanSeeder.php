<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasBerjalanSeeder extends Seeder
{
    public function run()
    {
        DB::table('kelas_berjalan')->insert([
            ['month' => 'January', 'amount' => 700],
            ['month' => 'February', 'amount' => 750],
            ['month' => 'March', 'amount' => 720],
        ]);
    }
}
