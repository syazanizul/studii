<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubtopicListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtopics_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 35);
            $table->unsignedBigInteger('chapter_id');
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->foreign('chapter_id')->references('id')->on('chapters_list');
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
