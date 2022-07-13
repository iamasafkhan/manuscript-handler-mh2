<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_countries', function (Blueprint $table) {

		$table->char('iso1_code');
		$table->string('name_caps');
		$table->string('name');
		$table->char('iso3_code',3)->nullable();
		$table->smallInteger('num_code')->nullable();
		$table->integer('shipping_rate');
		$table->integer('shiping_rate_otherkg');
		$table->string('ccode');
		$table->string('status')->default('A');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_countries');
    }
}