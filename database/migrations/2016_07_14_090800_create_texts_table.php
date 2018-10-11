<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->timestamps();
        });


        Schema::create('text_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('text_id')->unsigned();
            $table->string('locale')->index();

            $table->string('value');

            $table->unique(['text_id','locale']);
            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');

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
        Schema::drop('text_translations');
        Schema::drop('texts');
    }
}
