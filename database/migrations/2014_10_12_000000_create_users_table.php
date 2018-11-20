<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->date('birthday')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('native_language')->nullable();
            
            $table->boolean('is_student')->default(true);
            $table->string('user_code', 100)->nullable();

            $table->boolean('has_disability')->default(false);
            $table->string('disability')->nullable();

            $table->integer('user_role')->unsigned()->default(1);
            $table->foreign('user_role')->references('id')->on('userroles');
            


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
