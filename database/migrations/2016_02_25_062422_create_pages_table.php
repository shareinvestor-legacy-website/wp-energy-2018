<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{



    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->increments('id');
            //baum
            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();

            $table->string('status')->index();
            $table->string('slug')->index();
            $table->string('path')->index();
            $table->dateTime('date');

            $table->timestamps();
        });


        Schema::create('page_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('alternate_title')->nullable();
            $table->string('image')->nullable();;

            $table->string('external_url')->nullable();
            $table->string('external_url_target')->nullable();

            $table->mediumText('excerpt')->nullable();
            $table->mediumText('body')->nullable();
            $table->string('file')->nullable();

            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();

            $table->unique(['page_id','locale']);
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

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
        Schema::drop('page_translations');
        Schema::drop('pages');
    }
}
