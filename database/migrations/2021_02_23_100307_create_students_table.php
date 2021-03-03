<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->tinyInteger('gbs_id')->unsigned();
            $table->foreign('gbs_id')->references('id')->on('gbs');
            $table->string('student_id')->nullable();
            $table->string('scholar_no')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('samarg_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('mobile_no2')->nullable();
            $table->string('account_no')->nullable();
            $table->string('add_session')->nullable();
            $table->string('profile_picture')->nullable();
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
