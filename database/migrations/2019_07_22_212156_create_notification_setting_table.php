<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('payment_issued');
            $table->boolean('unread_msg');
            $table->boolean('new_invite_opportunity');
            $table->boolean('campaign_duedate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_setting');
    }
}
