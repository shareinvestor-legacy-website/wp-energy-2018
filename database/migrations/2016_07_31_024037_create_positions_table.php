<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();

            $table->string('status');
            $table->dateTime('date');
            $table->integer('availability')->unsigned();;


           // $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
          //  $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');


            $table->timestamps();
        });


        Schema::create('position_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('position_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('qualification')->nullable();
            $table->text('description')->nullable();

            $table->string('external_url')->nullable();;
            $table->string('external_url_target')->nullable();;

            $table->unique(['position_id','locale']);
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

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
        Schema::drop('position_translations');
        Schema::drop('positions');
    }
}