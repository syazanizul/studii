<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeacherProfileTracker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_profile_tracker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_teacher_id');
            $table->boolean('edit_profile')->nullable();
            $table->boolean('teaching_details')->nullable();
            $table->boolean('add_image')->nullable();
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
