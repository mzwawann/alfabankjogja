<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('message'); // Hapus kolom message
            $table->string('address')->after('name'); // Tambahkan kolom address
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->text('message')->nullable()->after('email'); // Tambahkan kembali kolom message
            $table->dropColumn('address'); // Hapus kolom address
        });
    }
}

