<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountAttemptMonthlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_attempt_monthly', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_teacher_id');
            $table->integer('total_attempt');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
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
