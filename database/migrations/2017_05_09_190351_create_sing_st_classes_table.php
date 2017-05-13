<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingStClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sing_st_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('student_id');
            $table->integer('classes_grate');
            $table->integer('final_grate');
            $table->integer('ave_grate');
            $table->integer('pass_or_fail');
            $table->integer('teacher_id');
            $table->integer('main_level');
            $table->integer('sub_level');
            $table->date('term_start');
            $table->date('term_end');

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
        Schema::dropIfExists('sing_st_classes');
    }
}
