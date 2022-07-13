<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhMorepagecontentTable extends Migration
{
	public function up()
	{
		Schema::create('mh_morepagecontent', function (Blueprint $table) {

			$table->id();
			$table->string('typeofpage');
			$table->integer('parentid');
			$table->string('page_title')->nullable();
			$table->string('page_heading');
			$table->string('page_subheading');
			$table->string('page_url');
			$table->longText('meta_keyword');
			$table->longText('meta_phrase');
			$table->string('page_image');
			$table->longText('meta_description');
			$table->string('page_type')->nullable();
			$table->integer('entry_by');
			$table->datetime('entry_date');
			$table->datetime('modified_date');
			$table->integer('modified_by');
			$table->integer('link_id');
			$table->string('type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_morepagecontent');
	}
}
