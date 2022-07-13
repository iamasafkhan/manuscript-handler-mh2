<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsPdfcontentTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_pdfcontent', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('userID');
            $table->longText('meta_content');
            $table->longText('meta_tables');
            $table->string('meta_content_file');
            $table->string('meta_table_file');
            $table->string('orderNumber');
            $table->datetime('entryDate');
            $table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_pdfcontent');
    }
}
