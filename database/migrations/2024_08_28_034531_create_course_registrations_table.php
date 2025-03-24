<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ketentuan_dan_kebijakan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('tempat_tinggal');
            $table->string('ktp_photo');
            $table->string('no_whatsapp');
            $table->string('no_telp_orangtua');
            $table->string('instagram');
            $table->string('status');
            $table->string('asal_sekolah');
            $table->string('pekerjaan');
            $table->string('bekerja_di');
            $table->string('jenis_program');
            $table->string('model_pembelajaran');
            $table->string('program_studi')->nullable();
            $table->string('jam');
            $table->date('mulai_pendidikan');
            $table->string('informasi');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('alat_transportasi');
            $table->boolean('pilihan_kip');
            $table->boolean('pilihan_kps');
            $table->boolean('ketentuan_kebijakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
