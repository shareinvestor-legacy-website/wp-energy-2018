<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->increments('id');

            $table->string('slug')->nullable()->index();
            $table->string('status')->index();
            $table->boolean('sticky')->default(false);
            $table->dateTime('date')->index();
            $table->dateTime('period_from')->nullable()->index();
            $table->dateTime('period_to')->nullable()->index();

            $table->timestamps();
        });


        Schema::create('post_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('alternate_title')->nullable();
            $table->string('image')->nullable();;
            $table->string('external_url')->nullable();;
            $table->string('external_url_target')->nullable();;
            $table->mediumText('excerpt')->nullable();
            $table->mediumText('body')->nullable();
            $table->string('file')->nullable();

            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('category_post', function (Blueprint $table) {

            $table->integer('post_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('order')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

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
        Schema::drop('category_post');
        Schema::drop('post_translations');
        Schema::drop('posts');
    }
}
