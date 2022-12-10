<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raport', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->integer('idmurid')->unsigned()->nullable();
            $table->foreign('idmurid')->references('id')->on('murid')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('idkategorinilai')->unsigned()->nullable();
            $table->foreign('idkategorinilai')->references('id')->on('kategorinilai')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('idsemester')->unsigned()->nullable();
            $table->foreign('idsemester')->references('id')->on('semester')->onUpdate('cascade')->onDelete('cascade');
            $table->double('nilai');
            $table->text('deskripsi');
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
        Schema::dropIfExists('raport');
    }
}
