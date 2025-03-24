<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestSeeder extends Seeder
{
    public function run()
    {
        Guest::create([
            'name' => 'John Doe',
            'telepon' => '0888987654321',
            'kursus' => 'microsoft office',
            'status_pendidikan' => 'alxander school',
            'tahu_alfabank_dari' => 'network media',
            'tujuan_motivasi_kursus' => 'skill upgrade',
            'status' => 'info',
            'FU' => 'null',
        ]);
    }
}
