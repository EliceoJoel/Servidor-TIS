<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeritosRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meritosRegister', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_postulant');
            $table->integer('id_merito');
            $table->double('nota_merito', 15, 8);
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
        Schema::dropIfExists('meritosRegister');
    }
}
