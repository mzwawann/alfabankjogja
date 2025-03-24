<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingsTable extends Migration
{
    public function up()
    {
        Schema::create('marketing', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->integer('sales');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing');
    }
}
