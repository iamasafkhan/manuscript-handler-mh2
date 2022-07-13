<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSeometatagsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_seometatags', function (Blueprint $table) {

			$table->id();
			$table->text('classification');
			$table->text('robots');
			$table->text('google_site_verification');
			$table->text('language');
			$table->text('resource_type');
			$table->text('copyright');
			$table->text('author');
			$table->text('PICS_Label');
			$table->text('distribution');
			$table->text('coverage');
			$table->text('country');
			$table->text('location');
			$table->integer('entry_by');
			$table->datetime('entry_date');
			$table->datetime('modified_date');
			$table->integer('modified_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_seometatags');
	}
}
