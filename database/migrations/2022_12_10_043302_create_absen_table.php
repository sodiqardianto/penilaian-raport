<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->integer('idsemester')->unsigned()->nullable();
            $table->foreign('idsemester')->references('id')->on('semester')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('idmurid')->unsigned()->nullable();
            $table->foreign('idmurid')->references('id')->on('murid')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('alpha');
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
        Schema::dropIfExists('absen');
    }
}
