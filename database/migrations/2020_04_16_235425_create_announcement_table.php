<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement',function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('year', 10);
        $table->string('type', 30);
        $table->string('departament');
        //$table->json('auxiliary');
        $table->string('file');
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
