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
            $table->string('en_class_id')->unique();;
            $table->string('class_name');
            $table->date('term_start');
            $table->date('term_end');
            $table->string('final_date_time');
            $table->string('class_start_end_time_1')->nullable();
            $table->string('class_start_end_time_2')->nullable();
            $table->string('class_start_end_time_3')->nullable();
            $table->string('class_start_end_time_4')->nullable();
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
