<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('Hotel_ID');
            $table->integer('User_ID')->nullable();
            $table->string('Check_In', 50);
            $table->string('Check_Out', 50);
            $table->integer('Room_ID')->nullable();
            $table->string('Note')->nullable();
            $table->integer('Partner_ID')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
