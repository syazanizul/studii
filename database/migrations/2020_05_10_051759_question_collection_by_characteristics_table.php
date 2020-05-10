<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionCollectionByCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_collection_by_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_collection_parent_id');
            $table->integer('exam_id');
            $table->integer('level_id');
            $table->integer('subject_id');
            $table->integer('chapter_id');
            $table->integer('subtopic_id');
            $table->integer('year');
            $table->integer('paper_id');
            $table->integer('source_id');
            $table->integer('difficulty_id');
            $table->integer('creator_id');
            $table->timestamps();
        });


//        Schema::drop('question_collection_grandparent');
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
