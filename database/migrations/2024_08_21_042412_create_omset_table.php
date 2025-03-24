<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmsetTable extends Migration
{
    public function up()
    {
        Schema::create('omset', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->decimal('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('omset');
    }
}
