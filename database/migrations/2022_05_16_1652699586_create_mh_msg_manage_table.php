<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhMsgManageTable extends Migration
{
    public function up()
    {
        Schema::create('mh_msg_manage', function (Blueprint $table) {

            $table->id();
            $table->text('message');
            $table->string('type');
            $table->string('page_id');
            $table->integer('entry_by');
            $table->datetime('entry_date');
            $table->datetime('modified_date');
            $table->integer('modified_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_msg_manage');
    }
}
