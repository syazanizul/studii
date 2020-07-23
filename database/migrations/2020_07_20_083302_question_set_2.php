<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionSet2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_set_2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name_actual', 150);
            $table->unsignedBigInteger('submitter_id');
            $table->unsignedBigInteger('taken_by');
            $table->boolean('upload_status');
            $table->boolean('verified_by_submitter');
            $table->timestamps();

//            $table->foreign('ch_id')->references('id')->on('cha_list');
//            $table->foreign('chapter_id')->references('id')->on('chapters_list');
//            $table->foreign('chapter_id')->references('id')->on('chapters_list');
//            $table->foreign('chapter_id')->references('id')->on('chapters_list');
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
