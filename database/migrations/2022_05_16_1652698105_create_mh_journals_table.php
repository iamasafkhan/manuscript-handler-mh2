<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_journals', function (Blueprint $table) {

			$table->id();
            $table->unsignedBigInteger('companyID');
			$table->string('name');
			$table->string('seo');
			$table->string('journalHomePage');
			$table->text('shortDescription');
			$table->text('description');
			$table->text('spotLightDesc');
			$table->string('ithenticatestatus')->default('A');
			$table->tinyInteger('journalDisplayStatus');
			$table->string('status')->default('A');
			$table->string('leftimage');
			$table->string('detailimage');
			$table->string('bannerImage');
			$table->datetime('entryDate');
            $table->foreign('companyID')->references('id')->on('mh_companies')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_journals');
	}
}
