<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('is_admin');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('avaibale_coin')->default(0);
            $table->integer('free_download')->default(3);
            $table->integer('number_illegal')->default(0);
            $table->boolean('is_ban')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
            $table->dropColumn('is_admin');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            $table->dropColumn('avaiable_coin');
            $table->dropColumn('free_download');
            $table->dropColumn('number_illegal');
            $table->dropColumn('is_ban');
        });
    }
}
