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
            $table->string('pdf', 100);
            $table->string('name', 30);
            $table->string('year', 30);
            $table->string('subject', 30);
            $table->string('type', 30);
            
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
