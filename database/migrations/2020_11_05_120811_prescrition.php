<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prescrition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescrition', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('appointment_id');
            $table->integer('doc_id');
            $table->string('paitent_id');
            $table->string('prescriton_link');
            $table->integer('status')->nullable();
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
