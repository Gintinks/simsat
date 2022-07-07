<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('berat_sampah_kaca');
            $table->double('berat_sampah_karet');
            $table->double('berat_sampah_plastik');
            $table->double('berat_sampah_logam');
            $table->double('berat_sampah_kertas');
            $table->double('berat_sampah_lain_lain');
            $table->double('berat_sampah_organik');
            $table->double('berat_sampah_ke_tpa');
            $table->double('berat_sampah_diolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sampahs');
    }
}
