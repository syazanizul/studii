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
            $table->integer('year');
            $table->integer('paper');
            $table->integer('source');
            $table->integer('question_number');
            $table->integer('difficulty');
            $table->boolean('finished');
            $table->boolean('verified');
            $table->integer('submitted_by1');
            $table->integer('submitted_by2');
            $table->boolean('question_image');
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
