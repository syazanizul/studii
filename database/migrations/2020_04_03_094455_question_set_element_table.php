<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionSetElementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_set_element', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->integer('question_set_id');
            $table->boolean('upload_status');
            $table->boolean('verified_by_submitter');
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
