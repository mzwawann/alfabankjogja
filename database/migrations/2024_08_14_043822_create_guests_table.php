<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telepon')->nullable();
            $table->string('kursus')->nullable();
            $table->string('status_pendidikan')->nullable();
            $table->string('tahu_alfabank_dari')->nullable();
            $table->string('tujuan_motivasi_kursus')->nullable();
            $table->string('status')->default('Info');
            $table->string('FU')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
