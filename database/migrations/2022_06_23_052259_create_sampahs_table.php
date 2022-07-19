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
            $table->unsignedBigInteger('tps_id');
            $table->foreign('tps_id')->references('id')->on('tps');
            $table->integer('berat_sampah_kaca');
            $table->integer('berat_sampah_karet');
            $table->integer('berat_sampah_plastik');
            $table->integer('berat_sampah_logam');
            $table->integer('berat_sampah_kertas');
            $table->integer('berat_sampah_lain_lain');
            $table->integer('berat_sampah_anorganik');
            $table->integer('berat_sampah_organik');
            $table->integer('berat_sampah_ke_tpa');
            $table->integer('berat_sampah_diolah');  
            $table->integer('berat_sampah_total');  
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
