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
            $table->integer('user_id');
            $table->string('user_name','32');
            $table->string('email','255'); 
            $table->string('password','100');   
            $table->string('comment','255');   
            $table->string('icon','100');
            $table->timestamp('create_time');
            $table->primary('user_id');
            $table->primary('user_name');
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
