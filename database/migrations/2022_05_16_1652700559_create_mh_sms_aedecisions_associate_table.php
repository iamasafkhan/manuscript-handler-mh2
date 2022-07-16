<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAedecisionsAssociateTable extends Migration
{
	public function up()
	{
		Schema::create('mh_sms_aedecisions_associate', function (Blueprint $table) {

			$table->id();
			$table->string('editorType');
			$table->unsignedBigInteger('editorID');
			$table->unsignedBigInteger('userID');
			$table->string('attachment');
			$table->string('emailFrom');
			$table->string('emailTo');
			$table->string('emailCC');
			$table->string('emailBCC');
			$table->string('emailSubject');
			$table->string('review_decision');
			$table->text('decission_comments');
			$table->datetime('entryDate');
			$table->string('orderNumber');
			$table->enum('status', ['save', 'send']);
			$table->foreign('editorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_sms_aedecisions_associate');
	}
}
