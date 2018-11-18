<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title', 200)->nullable(false);
            $table->text('description')->nullable(false);
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
        Schema::dropIfExists('announcements');
    }
}
