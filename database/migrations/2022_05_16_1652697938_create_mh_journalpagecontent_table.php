<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalpagecontentTable extends Migration
{
	public function up()
	{
		Schema::create('mh_journalpagecontent', function (Blueprint $table) {

			$table->id();
			$table->unsignedBigInteger('journalID');
			$table->string('page_tab');
			$table->string('page_title')->nullable();
			$table->string('page_heading');
			$table->string('page_subheading');
			$table->longText('meta_keyword');
			$table->longText('meta_phrase');
			$table->string('page_url');
			$table->string('page_image');
			$table->string('page_thumbimage');
			$table->string('page_type')->nullable();
			$table->integer('entry_by');
			$table->datetime('entry_date');
			$table->datetime('modified_date');
			$table->integer('modified_by');
			$table->integer('link_id');
			$table->string('type');
			$table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_journalpagecontent');
	}
}
