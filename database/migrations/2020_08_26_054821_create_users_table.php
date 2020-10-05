<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('User_ID');
            $table->string('Prefix', 10);
            $table->string('F_Name', 50);
            $table->string('L_Name', 50);
            $table->string('Gender', 10);
            $table->string('Rank', 50);
            $table->string('Email', 50);
            $table->string('Phone', 10);
            $table->string('Province', 50);
            $table->string('Food_Group', 50);
            $table->string('Food_Allergy', 100)->nullable();
            $table->integer('Status');
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
        Schema::dropIfExists('users');
    }
}
