<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChapterListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 35);
            $table->unsignedBigInteger('subject');
            $table->unsignedBigInteger('level');
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->foreign('subject')->references('id')->on('subjects_list');
            $table->foreign('level')->references('id')->on('levels_list');
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
