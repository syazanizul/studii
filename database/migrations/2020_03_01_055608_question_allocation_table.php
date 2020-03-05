<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_allocation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('uploader');
            $table->unsignedBigInteger('working')->nullable();
            $table->unsignedBigInteger('verified_by_1')->nullable();
            $table->unsignedBigInteger('verified_by_2')->nullable();
            $table->unsignedBigInteger('language_primary')->nullable();
            $table->unsignedBigInteger('language_secondary')->nullable();
            $table->unsignedBigInteger('language_tertiary')->nullable();
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
