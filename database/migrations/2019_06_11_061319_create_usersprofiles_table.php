<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersprofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('userid')->unsigned();			
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country');
            $table->string('gender')->nullable();
            $table->boolean('hasimage');
            $table->boolean('isdeleted');
            $table->timestamps();
        });
		
		Schema::table('usersprofiles', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersprofiles');
    }
}
