<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->enum('user_type', ['Admin', 'User']);
            $table->enum('customer_type', ['user', 'merchant']);
            $table->enum('is_default', ['No', 'Yes'])->default('No');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
