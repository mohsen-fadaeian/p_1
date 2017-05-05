<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSubsForMainlevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subs_levels', function (Blueprint $table) {
            $table->foreign('mainlevel_id')->references('id')->on('main_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subs_levels', function (Blueprint $table) {
            $table->dropForeign(['mainlevel_id']);
        });
    }
}
