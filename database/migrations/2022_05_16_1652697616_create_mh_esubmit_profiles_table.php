<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhEsubmitProfilesTable extends Migration
{
	public function up()
	{
		Schema::create('mh_esubmit_profiles', function (Blueprint $table) {

			$table->id();
			$table->integer('standingID');
			$table->string('userType')->default('Author')->comment('Author, Reviewer, Editor, Editorial Office, Associate Editor, Publisher, Editorial Board Member');
			$table->unsignedBigInteger('companyID');
			$table->unsignedBigInteger('journalID');
			$table->string('prefixType');
			$table->string('firstName');
			$table->string('middleName');
			$table->string('lastName');
			$table->string('primaryEmailAddress');
			$table->string('secondaryEmailAddress');
			$table->string('institution');
			$table->string('department');
			$table->string('address');
			$table->string('country');
			$table->string('city');
			$table->string('postalCode');
			$table->string('phoneNumber');
			$table->string('mobileNumber');
			$table->string('faxNumber');
			$table->string('passWord');
			$table->string('passWordVisible');
			$table->tinyInteger('recvJournalInfo');
			$table->tinyInteger('revwJournalArticle');
			$table->date('entryDate');
			$table->tinyInteger('status');
		    $table->foreign('companyID')->references('id')->on('mh_companies')->onDelete('cascade');
			$table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
			
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_esubmit_profiles');
	}
}
