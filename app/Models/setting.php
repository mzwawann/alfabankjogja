<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;

    protected $table = 'ketentuan_dan_kebijakan_kursus';
    // protected $table = 'settings';

    protected $fillable = ['file_path'];
}
