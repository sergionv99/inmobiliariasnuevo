<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('propiedad_id')->unsigned();
            $table->string('photo');
            $table->foreign('propiedad_id')->references('id')->on('propierties')->onDelete('cascade');
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
        Schema::dropIfExists('properties_photos');
    }
}
