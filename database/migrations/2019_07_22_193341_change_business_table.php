<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('business')) {
            Schema::table('business', function (Blueprint $table) {
                $table->string('ProfilePic')->default('profile_default.png')->change();
                $table->string('ProfilePic_back')->default('profile_back.png');
                $table->string('address', 255)->default('');
                $table->string('city', 255)->default('');
                $table->string('country', 255)->default('');
                $table->string('state', 255)->default('');
                $table->string('zipcode', 255)->default('');
                $table->string('biz_description', 1024)->default('');
                $table->boolean('profile_completed')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business', function (Blueprint $table) {
            $table->dropColumn('ProfilePic_back');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('description');
            $table->dropColumn('profile_completed');
        });
    }
}
