<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('location', 255);
            $table->string('address', 255);
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birthday');
            $table->string('phone', 255);
            $table->enum('phone_type', ['Android', 'iPhone']);
            $table->integer('income_year');
            $table->enum('parental_status', ['Kids', 'No Kids']);
            $table->enum('relationship_status', ['Married', 'Single']);
            $table->enum('race', ['White', 'American Indian or Alaska Native',
                        'Asian', 'Black or African American', 'Hispanic or Latino',
                        'Native Hawaiian or Other Pacific Islander']);
            $table->enum('employment_status', ['Unemployed', 'Employed']);
            $table->enum('sexual_orientation', ['Heterosexual', 'Asexual', 'Bisexual', 'Homosexual']);
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
        Schema::dropIfExists('profile');
    }
}
