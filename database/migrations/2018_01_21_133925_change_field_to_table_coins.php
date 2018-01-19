<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldToTableCoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->integer('coins_receive');
        $table->renameColumn('cost_per_coin', 'cost');
        $table->integer('cost')->change();
        $table->integer('type');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('coins_receive');
        $table->dropColumn('type');
        $table->renameColumn('cost', 'cost_per_coin');
        $table->float('cost_per_coin')->change();
    }
}
