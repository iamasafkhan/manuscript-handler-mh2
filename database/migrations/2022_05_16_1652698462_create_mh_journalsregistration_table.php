<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsregistrationTable extends Migration
{
	public function up()
	{
		Schema::create('mh_journalsregistration', function (Blueprint $table) {

			$table->id();
			$table->string('jiname');
			$table->string('jiemail');
			$table->string('jijname');
			$table->string('jiweb');
			$table->string('jiissn');
			$table->string('jiipy');
			$table->string('jinameofpublisher');
			$table->string('orderNumber');
			$table->float('paidAmount');
			$table->tinyInteger('paymentStatus');
			$table->datetime('entryDate');
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_journalsregistration');
	}
}
