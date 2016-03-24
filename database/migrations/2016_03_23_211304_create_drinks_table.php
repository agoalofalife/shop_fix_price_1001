<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',30);
            $table->string('mark',30);
            $table->integer('count');
            $table->enum('volume',['0.33','0.5','1.0']);
            $table->text('description');
            $table->enum('status',['0','1']);
            $table->string('color_tara',50);
            $table->boolean('gases');
            $table->boolean('recommend');
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
        Schema::drop('drinks');
    }
}
