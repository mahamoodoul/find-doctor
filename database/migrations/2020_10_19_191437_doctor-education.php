<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DoctorEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institution');
            $table->string('subject');
            $table->string('starting');
            $table->string('ending');
            $table->string('degree');
            $table->string('grade');
            $table->string('birth_date');
            $table->string('image');

          

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
