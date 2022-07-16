<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhAreasOfInterestSelectedTable extends Migration
{
    public function up()
    {
        Schema::create('mh_areas_of_interest_selected', function (Blueprint $table) {

        $table->id();
		$table->string('standingID');
		$table->integer('classifyID');
		$table->integer('parentID');
		$table->integer('profileID');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_areas_of_interest_selected');
    }
}