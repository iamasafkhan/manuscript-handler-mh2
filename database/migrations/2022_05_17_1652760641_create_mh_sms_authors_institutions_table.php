<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAuthorsInstitutionsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_sms_authors_institutions', function (Blueprint $table) {

			$table->id();
			$table->unsignedBigInteger('userID');
			$table->integer('manuscriptID');
			$table->string('authSequence');
			$table->string('authTitle');
			$table->string('authFirstName');
			$table->string('authLastName');
			$table->string('authEmailAddress');
			$table->string('authAffiliation');
			$table->string('authCountry');
			$table->string('authCorresponding');
			$table->string('orderNumber');
			$table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_sms_authors_institutions');
	}
}
