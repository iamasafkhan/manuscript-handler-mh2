<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsSelectedrevlistTable extends Migration
{
	public function up()
	{
		Schema::create('mh_sms_selectedrevlist', function (Blueprint $table) {

			$table->id();

			$table->enum('editorType', ['', 'Editor', 'Associate Editor'])->default('');
			$table->integer('editorID');
			$table->integer('reviewerID');
			$table->string('reviewerType');
			$table->string('salutation');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('emailAddress');
			$table->string('orderNumber');
			$table->datetime('entryDate');
			$table->date('dated');
			$table->tinyInteger('status');
			$table->enum('invitation', ['Invited', 'Uninvited'])->default('Uninvited');
			$table->text('invitationDescription');
			$table->datetime('invitationDate');
			$table->enum('reviewer_stutus', ['Waiting', 'Accepted', 'Rejected', 'Late Response', 'No Response', 'Unavailable', 'Auto-Declined (No Response)'])->default('Waiting');
			$table->datetime('reviewer_date');
			$table->tinyInteger('want_to_review');
			$table->tinyInteger('readStatus');
			$table->tinyInteger('extendStatus')->default('0');
			$table->string('extendDescription');
			$table->tinyInteger('scoreSubmit');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_sms_selectedrevlist');
	}
}
