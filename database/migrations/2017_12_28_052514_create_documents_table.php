<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('category_id');
            $table->string('file_name');
            $table->text('description');
            $table->float('size');
            $table->string('file_type');
            $table->string('thumbnail');
            $table->integer('dowloads')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('is_illegal')->default(false);
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
        Schema::dropIfExists('documents');
    }
}
