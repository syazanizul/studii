<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeacherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_teacher_id');
            $table->integer('title');
            $table->integer('gender');
            $table->integer('ic');
            $table->integer('phone');
            $table->integer('preferred_mode_communication');
            $table->integer('profile_pic')->nullable();
            $table->boolean('background_pic')->nullable();
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
