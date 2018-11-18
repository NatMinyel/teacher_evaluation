<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->string('name', 100)->nullable(false);
            $table->text('description')->nullable(true);
            $table->boolean('is_all_year')->default(false);
            $table->integer('year_offered')->unsigned()->nullable(false);
            $table->integer('semester_offered')->unsigned()->nullable(false);
            $table->integer('program')->unsigned()->nullable(false);
            
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
        Schema::dropIfExists('courses');
    }
}
