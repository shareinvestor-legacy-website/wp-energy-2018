<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('status');
            $table->dateTime('date');


            $table->timestamps();
        });


        Schema::create('gallery_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['gallery_id','locale']);
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('galleryables', function (Blueprint $table) {
            $table->integer('gallery_id')->unsigned()->index();;
            $table->integer('galleryable_id')->unsigned()->index();;
            $table->string('galleryable_type');


            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->timestamps();
        });



        //images
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();


            $table->string('path');
            $table->integer('order')->unsigned();


            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');


            $table->timestamps();

        });


        Schema::create('image_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('image_id')->unsigned();
            $table->string('locale')->index();

            $table->string('caption');



            $table->unique(['image_id','locale']);
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

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
        Schema::drop('image_translations');
        Schema::drop('images');
        Schema::drop('galleryables');
        Schema::drop('gallery_translations');
        Schema::drop('galleries');
    }
}
