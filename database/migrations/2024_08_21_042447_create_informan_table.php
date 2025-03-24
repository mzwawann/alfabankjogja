<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformanTable extends Migration
{
    public function up()
    {
        Schema::create('informan', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->decimal('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informan');
    }
}
