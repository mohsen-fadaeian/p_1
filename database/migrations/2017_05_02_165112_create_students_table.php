<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->bigInteger('home_tell_number');
            $table->bigInteger('emergency_tell_number');
            $table->bigInteger('mobile_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('school_level');
            $table->string('sex');
            $table->string('dad_name');
            $table->date('birth_date');
            $table->bigInteger('student_id');
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
        Schema::dropIfExists('students');
    }
}
