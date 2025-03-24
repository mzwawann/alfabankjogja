<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasBerjalanTable extends Migration
{
    public function up()
    {
        Schema::create('kelas_berjalan', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->decimal('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas_berjalan');
    }
}
