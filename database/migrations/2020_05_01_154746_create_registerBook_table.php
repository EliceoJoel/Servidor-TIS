<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_book',function (Blueprint $table) {
            $table->increments('id');
            $table->string('names', 60);
            $table->string('first_surname', 30);
            $table->string('second_surname', 30);
            $table->string('direction', 100);
            $table->string('email', 100);
            $table->string('phone', 8);
            $table->string('ci', 8);
            $table->string('sis_code', 9);
            $table->string('announcement');
            $table->string('auxiliary');
            $table->string('docNumber');
            $table->string('date');
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
