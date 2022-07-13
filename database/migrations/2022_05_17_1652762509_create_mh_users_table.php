<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhUsersTable extends Migration
{
    public function up()
    {
        Schema::create('mh_users', function (Blueprint $table) {

            $table->id();

            $table->string('user_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('skype');
            $table->string('address');
            $table->string('user_password');
            $table->string('status')->default('A');
            $table->tinyInteger('flag');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_users');
    }
}
