<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnfEsubmitTypesofmanuscriptTable extends Migration
{
    public function up()
    {
        Schema::create('snf_esubmit_typesofmanuscript', function (Blueprint $table) {

            $table->id();

            $table->integer('journalID');
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('snf_esubmit_typesofmanuscript');
    }
}
