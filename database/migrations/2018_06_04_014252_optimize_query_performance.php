<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OptimizeQueryPerformance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('display_path')->index()->after('path');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('display_path')->index()->after('path');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->string('display_path')->index()->after('path');
        });

        Schema::table('text_translations', function (Blueprint $table) {
            $table->text('value')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
