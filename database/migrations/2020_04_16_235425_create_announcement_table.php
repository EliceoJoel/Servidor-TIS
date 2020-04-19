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
        $table->string('name', 30);
        $table->string('year', 30);
        $table->string('type', 30);
        $table->string('departament', 50);
        $table->json('auxiliary');
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
