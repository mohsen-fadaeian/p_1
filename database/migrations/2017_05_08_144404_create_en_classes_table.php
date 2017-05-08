<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_class_id');
            $table->string('class_name');
            $table->date('class_start');
            $table->date('class_end');
            $table->integer('main_level');
            $table->integer('sub_level');
            $table->integer('teacher_id');
            $table->integer('status');
            $table->integer('class_max_size');

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
        Schema::dropIfExists('en_classes');
    }
}
