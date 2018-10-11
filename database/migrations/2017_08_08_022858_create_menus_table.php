<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('menus', function (Blueprint $table) {

            $table->increments('id');

            //baum
            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();

            $table->integer('page_id')->nullable()->index();
            $table->string('status')->index();
            $table->string('slug')->index();
            $table->string('path')->index();


            $table->timestamps();
        });


        Schema::create('menu_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('locale')->index();


            $table->string('name');
            $table->string('external_url')->nullable();;
            $table->string('external_url_target')->nullable();;

            $table->unique(['menu_id','locale']);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

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


        Schema::drop('menu_translations');
        Schema::drop('menus');
    }
}
