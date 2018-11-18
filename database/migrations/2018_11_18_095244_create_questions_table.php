<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use config\enums;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('content')->nullable(false);
            $table->text('help')->nullable();
            $table->integer('render_as')->unsigned()->default(1);
            
            $table->integer('evaluation_form')->unsigned();
            $table->foreign('evaluation_form')->references('id')->on('evaluationforms')->onDelete('cascade');
            
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
        Schema::dropIfExists('questions');
    }
}
