<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country', 255)->default('')->nullable();
            $table->string('biz_address_1', 255)->default('')->nullable();
            $table->string('biz_address_2', 255)->default('')->nullable();
            $table->string('biz_city', 255)->default('')->nullable();
            $table->string('biz_state', 255)->default('')->nullable();
            $table->string('biz_zipcode', 255)->default('')->nullable();
            $table->string('biz_phone', 255)->default('')->nullable();
            $table->string('biz_type', 255)->default('')->nullable();
            $table->string('ein', 255)->default('')->nullable();
            $table->string('website', 255)->default('')->nullable();
            $table->string('industry', 255)->default('')->nullable();
            $table->string('biz_description', 255)->default('')->nullable();
            $table->string('first_name', 255)->default('')->nullable();
            $table->string('last_name', 255)->default('')->nullable();
            $table->string('email', 255)->default('')->nullable();
            $table->string('phone', 255)->default('')->nullable();
            $table->string('birthday', 255)->default('')->nullable();
            $table->string('ssn', 255)->default('')->nullable();
            $table->string('home_address_1', 255)->default('')->nullable();
            $table->string('home_address_2', 255)->default('')->nullable();
            $table->string('home_city', 255)->default('')->nullable();
            $table->string('home_state', 255)->default('')->nullable();
            $table->string('home_zipcode', 255)->default('')->nullable();
            $table->string('card_state_descriptor', 255)->default('')->nullable();
            $table->string('card_shortend_descriptor', 255)->default('')->nullable();
            $table->string('support_phone', 255)->default('')->nullable();
            $table->string('customer_address_1', 255)->default('')->nullable();
            $table->string('customer_address_2', 255)->default('')->nullable();
            $table->string('customer_city', 255)->default('')->nullable();
            $table->string('customer_state', 255)->default('')->nullable();
            $table->string('customer_zipcode', 255)->default('')->nullable();
            $table->string('routing_number', 255)->default('')->nullable();
            $table->string('account_number', 255)->default('')->nullable();
            $table->integer('business_user_id');
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
        Schema::dropIfExists('business_payment');
    }
}
