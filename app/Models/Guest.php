<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telepon',
        'kursus',
        'status_pendidikan',
        'tahu_alfabank_dari',
        'tujuan_motivasi_kursus',
        'status',
        'FU',
    ];
}
