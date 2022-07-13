<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAeAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_ae_attachments', function (Blueprint $table) {

            $table->id();
            $table->string('editorType');
            $table->unsignedBigInteger('editorID');
            $table->unsignedBigInteger('userID');
            $table->string('attachment');
            $table->datetime('entryDate');
            $table->string('orderNumber');
            $table->foreign('editorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_ae_attachments');
    }
}
