<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('center_name');
            $table->integer('capacity');
            $table->string('price_range');
            $table->text('center_details');
            $table->string('picture');
            $table->text('facilities');
            $table->string('city');
            $table->string('sub_city');
            $table->text('full_address');
            $table->string('active');
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
        Schema::drop('centers');
    }
}
