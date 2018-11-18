<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluationforms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title', 200)->nullable(false);
            $table->text('description')->nullable(true);
            $table->boolean('is_hidden')->default(true);
            $table->boolean('is_anonymous')->default(true);
            $table->float('average_score')->unsigned()->nullable();
            
            $table->boolean('is_for_course')->default(false);
            $table->integer('course')->unsigned()->nullable();
            $table->foreign('course')->references('id')->on('courses');

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
        Schema::dropIfExists('evaluationforms');
    }
}
