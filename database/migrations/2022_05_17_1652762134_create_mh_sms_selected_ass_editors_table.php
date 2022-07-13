<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsSelectedAssEditorsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_selected_ass_editors', function (Blueprint $table) {

            $table->id();

		$table->unsignedBigInteger('assEditorID');
		$table->string('firstName');
		$table->string('emailAddress');
		$table->string('orderNumber');
		$table->datetime('entryDate');
		$table->enum('role',['Waiting','Accepted','Declined']);
		$table->datetime('roledated');
		$table->tinyInteger('status');
        $table->foreign('assEditorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
        $table->timestamps();
        
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_selected_ass_editors');
    }
}