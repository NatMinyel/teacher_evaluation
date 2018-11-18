<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->string('content', 200)->nullable(false);
            $table->text('help_text')->nullable(true);
            $table->boolean('is_disabled')->default(false);

            $table->integer('question')->unsigned();
            $table->foreign('question')->references('id')->on('questions')->onDelete('cascade');
            
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
        Schema::dropIfExists('options');
    }
}
