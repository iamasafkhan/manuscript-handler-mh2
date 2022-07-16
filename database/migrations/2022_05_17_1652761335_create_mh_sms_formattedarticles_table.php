<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsFormattedarticlesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_formattedarticles', function (Blueprint $table) {

	    $table->id();
		$table->unsignedBigInteger('publisherID');
		$table->unsignedBigInteger('authorID');
		$table->string('formattedPDF');
		$table->string('formattedPDF2');
		$table->string('formattedPDF3');
		$table->string('formattedPDF4');
		$table->string('formattedPDF5');
		$table->text('yourComments');
		$table->datetime('entryDate');
		$table->string('orderNumber');


       $table->foreign('authorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
		$table->foreign('publisherID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
        $table->timestamps();
       
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_formattedarticles');
    }
}