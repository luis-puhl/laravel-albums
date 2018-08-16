<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('composer')->nullable();
            $table->unsignedBigInteger('duration')->nullable();
            $table->unsignedInteger('order_number')->nullable();

            $table->unsignedInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
