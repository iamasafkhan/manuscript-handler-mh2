<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhDemorequestsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_demorequests', function (Blueprint $table) {

        $table->id();
		$table->string('preferredDates');
		$table->string('yourName');
		$table->string('publication');
		$table->string('emailAddress');
		$table->string('telephone');
		$table->enum('meansofdemo',['Skype','Telephonic Call','Live chat','Other']);
		$table->text('comments');
		$table->datetime('entryDate');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_demorequests');
    }
}