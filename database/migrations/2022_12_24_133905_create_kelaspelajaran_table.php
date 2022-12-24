<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelaspelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelaspelajaran', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->integer('idkelas')->unsigned()->nullable();
            $table->foreign('idkelas')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('idgurupelajaran')->unsigned()->nullable();
            $table->foreign('idgurupelajaran')->references('id')->on('gurupelajaran')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('kelaspelajaran');
    }
}
