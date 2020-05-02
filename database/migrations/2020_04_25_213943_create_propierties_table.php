<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propierties', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('id_user')->unsigned();
                $table->decimal('price', 8,2);
                $table->string('type',80);
                $table->string('state',80);
                $table->string('description',255);
                $table->integer('area');
                $table->string('direction', 255);
                $table->string('city', 255);
                $table->string('province', 255);
                $table->integer('cp');
                $table->boolean('published');
                $table->foreign('id_user')->references('id')->on('users');

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
        Schema::dropIfExists('propierties');
    }
}
