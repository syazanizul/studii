<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CountAttempt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_attempt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('uploader');
            $table->unsignedBigInteger('working')->nullable();
            $table->unsignedBigInteger('verified_by_1');
            $table->unsignedBigInteger('verified_by_2');
            $table->unsignedBigInteger('language')->nullable();
            $table->integer('correct');
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
