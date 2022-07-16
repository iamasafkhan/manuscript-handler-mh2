<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAuthorchecklistTable extends Migration
{
	public function up()
	{
		Schema::create('mh_sms_authorchecklist', function (Blueprint $table) {

			$table->id();
			$table->unsignedBigInteger('userID');
			$table->unsignedBigInteger('journalID');
			$table->enum('agree', ['Agree', 'Disagree']);
			$table->enum('conflictOfinterest', ['Yes', 'No']);
			$table->string('clarifyStatement');
			$table->datetime('entryDate');
			$table->datetime('statusDated');
			$table->tinyInteger('submitStatus');
			$table->string('manuscriptStatus');
			$table->enum('reviewer_accept', ['', 'Accepted', 'Rejected'])->default('');
			$table->enum('revision_process', ['Yes', 'No'])->default('No');
			$table->string('orderNumber');
			$table->string('figuresTables');
			$table->tinyInteger('resubmit');
			$table->tinyInteger('pdf_accept');
			$table->string('finalpdfgenerated');
			$table->enum('financialSupport', ['Yes', 'No']);
			$table->tinyInteger('transfered');
			$table->datetime('transferDate');
			$table->tinyInteger('withAssociateEditor')->default('0');
			$table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_sms_authorchecklist');
	}
}
