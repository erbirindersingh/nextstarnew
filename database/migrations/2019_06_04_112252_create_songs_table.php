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
			$table->bigIncrements('id');
            $table->string('title');
            $table->bigInteger('artistid')->unsigned();
            $table->bigInteger('albumid')->unsigned();
            $table->string('genre');
            $table->timestamps();
        });
		
		Schema::table('songs', function (Blueprint $table) {
            $table->foreign('artistid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('albumid')->references('id')->on('albums')->onDelete('cascade');
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
