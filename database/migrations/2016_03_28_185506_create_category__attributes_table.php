<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category__attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')->unsigned();
            $table->string('parameter',100);
            $table->string('type',100);
            $table->string('default',200);
            $table->foreign('id_category')
                ->references('id')->on('category__products')
                ->onDelete('cascade');
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
        Schema::drop('category__attributes');
    }
}
