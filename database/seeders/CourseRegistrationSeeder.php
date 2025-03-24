<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Untuk mengelola tanggal

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_registrations')->insert([
            [
                'ketentuan_dan_kebijakan' => 'accepted',
                'nama_lengkap' => 'John Cena',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::parse('2000-01-01'),
                'jenis_kelamin' => 'male',
                'agama' => 'Islam',
                'alamat_lengkap' => 'Jl. Merdeka No. 1',
                'photo_ktp' => 'john_doe.jpg',
                'telepon' => '+6281234567890',
                'telepon_orangtua' => '081234567891',
                'akun_instagram' => '@johndoe',
                'status' => 'Mahasiswa',
                'asal_sekolah_kampus' => 'SMA Negeri 1 Jakarta',
                'pekerjaan' => 'Pelajar',
                'bekerja_di' => 'Tidak ada',
                'jenis_program' => 'Reguler',
                'model_pembelajaran' => 'Offline',
                'program_studi' => 'Teknik Informatika',
                'jam_pilihan' => '08:00 - 12:00',
                'mulai_pendidikan' => Carbon::parse('2023-09-01'),
                'informasi' => 'google',
                'nama_ibu' => 'Jane Doe',
                'nama_ayah' => 'John Senior',
                'alat_transportasi' => 'Motor',
                'KIP' => 'Ya',
                'KPS' => 'Tidak',
            ],
        ]);
    }
}
