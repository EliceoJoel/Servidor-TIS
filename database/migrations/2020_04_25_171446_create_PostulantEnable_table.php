<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantEnableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PostulantEnable',function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_code', 9);
            $table->string('auxiliary', 50);
            $table->string('announcement', 50);
            $table->boolean('enable');
            $table->string('reason');
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
