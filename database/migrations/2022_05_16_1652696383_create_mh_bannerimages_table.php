<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhBannerimagesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_bannerimages', function (Blueprint $table) {

        $table->id();
		$table->integer('bannerServices');
		$table->string('bannerTitle');
		$table->string('bannerDescription');
		$table->string('bannerImage');
		$table->tinyInteger('bannerStatus');
		$table->datetime('entryDate');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_bannerimages');
    }
}