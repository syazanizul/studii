<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('exam');
            $table->integer('level');
            $table->integer('subject');
            $table->integer('chapter');
            $table->integer('subtopic');
            $table->integer('year');
            $table->integer('paper');
            $table->integer('source');
            $table->integer('question_number');
            $table->integer('difficulty');
            $table->boolean('finished');
            $table->boolean('verified');
//            $table->integer('submitted_by1');
//            $table->integer('submitted_by2');
            $table->boolean('question_image');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('uploader');
            $table->unsignedBigInteger('working')->nullable();
            $table->unsignedBigInteger('verified_by_1')->nullable();
            $table->unsignedBigInteger('verified_by_2')->nullable();
            $table->unsignedBigInteger('language_primary')->nullable();
            $table->unsignedBigInteger('language_secondary')->nullable();
            $table->unsignedBigInteger('language_tertiary')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
