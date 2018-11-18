<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('course')->unsigned();
            $table->foreign('course')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('instructor')->unsigned();
            $table->foreign('instructor')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_instructors');
    }
}
