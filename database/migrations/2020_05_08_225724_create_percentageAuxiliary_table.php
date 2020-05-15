<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercentageAuxiliaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentageAuxiliary', function (Blueprint $table) {
            $table->increments('id');
           //  $table->integer('id_auxiliary');
           // $table->integer('id_theme');
            $table->integer('id_announcement');
            $table->string('auxiliary');
            $table->string('theme');
            $table->integer('percentage');
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
        //
    }
}
