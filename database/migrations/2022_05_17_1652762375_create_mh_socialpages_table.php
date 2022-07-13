<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSocialpagesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_socialpages', function (Blueprint $table) {

            $table->id();

            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('googleplus');
            $table->string('wikipedia');
            $table->string('youtube');
            $table->string('podcast');
            $table->string('rss');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_socialpages');
    }
}
