<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'ketentuan_dan_kebijakan',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_lengkap',
        'photo_ktp',
        'telepon',
        'telepon_orangtua',
        'akun_instagram',
        'status',
        'asal_sekolah_kampus',
        'pekerjaan',
        'bekerja_di',
        'jenis_program',
        'model_pembelajaran',
        'program_studi',
        'jam_pilihan',
        'mulai_pendidikan',
        'informasi',
        'nama_ibu',
        'nama_ayah',
        'alat_transportasi',
        'KIP',
        'KPS',
    ];
}
