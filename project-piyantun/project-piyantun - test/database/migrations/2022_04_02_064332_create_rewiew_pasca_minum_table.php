<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewiewPascaMinumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewiew_pasca_minum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('nama_pelanggan');
            $table->integer('rating_rasa');
            $table->integer('rating_manfaat');
            $table->text('ulasan');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rewiew_pasca_minum');
    }
}
