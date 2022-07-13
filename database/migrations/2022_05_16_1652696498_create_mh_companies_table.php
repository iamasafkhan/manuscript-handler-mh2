<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_companies', function (Blueprint $table) {

		$table->id();
		$table->string('companyName');
		$table->string('companyShortName');
		$table->string('companySEOURL');
		$table->string('companyEmailAddress');
		$table->string('companyPhoneNumber');
		$table->string('companyWebsite');
		$table->text('companyAddress');
		$table->string('companyLogo');
		$table->text('companyDescription');
		$table->datetime('entryDate');
		$table->tinyInteger('companyDisplayStatus')->default('0');
		$table->tinyInteger('companyStatus');
		$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_companies');
    }
}