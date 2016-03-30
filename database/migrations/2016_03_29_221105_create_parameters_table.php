<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category')  ->unsigned();
            $table->integer('id_product')   ->unsigned();
            $table->integer('id_parameter') ->unsigned();
            $table->string('data',100);
            $table->foreign('id_parameter')
                ->references('id')->on('category__attributes')
                ->onDelete('cascade');
            $table->foreign('id_product')
                ->references('id')->on('products')
                ->onDelete('cascade');
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
        Schema::drop('parameters');
    }
}
