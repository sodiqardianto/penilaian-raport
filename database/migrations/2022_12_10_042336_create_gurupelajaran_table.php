<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurupelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurupelajaran', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->integer('idpelajaran')->unsigned()->nullable();
            $table->foreign('idpelajaran')->references('id')->on('pelajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('idguru')->unsigned()->nullable();
            $table->foreign('idguru')->references('id')->on('guru')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('gurupelajaran');
    }
}
