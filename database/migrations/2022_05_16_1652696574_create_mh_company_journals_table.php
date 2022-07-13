<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhCompanyJournalsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_company_journals', function (Blueprint $table) {

        $table->id();
		$table->unsignedBigInteger('companyID');
		$table->unsignedBigInteger('journalID');
		$table->datetime('entryDate');
		$table->tinyInteger('status');
        $table->foreign('companyID')->references('id')->on('mh_companies')->onDelete('cascade');
        $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
       
        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_company_journals');
    }
}