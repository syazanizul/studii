<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionSetFileUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_set', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name_actual', 150);
            $table->string('file_name_studii', 150);
            $table->integer('exam_id');
            $table->integer('subject_id');
            $table->integer('chapter_id');
            $table->integer('subtopic_id');
            $table->integer('paper');
            $table->unsignedBigInteger('submitter_id');
            $table->boolean('upload_status');
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
