<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhAreasOfInterestTable extends Migration
{
    public function up()
    {
        Schema::create('mh_areas_of_interest', function (Blueprint $table) {

        $table->id();
		$table->integer('parentID');
		$table->integer('journalID');
		$table->string('title');
		$table->string('seo_url');
		$table->tinyInteger('status');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_areas_of_interest');
    }
}