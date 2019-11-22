<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LevelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 35);
            $table->unsignedBigInteger('exam');
            $table->timestamps();

            $table->foreign('exam')->references('id')->on('exams_list');
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
