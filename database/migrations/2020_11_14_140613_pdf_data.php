<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PdfData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('app_id');
            $table->integer('doc_id');
            $table->string('paitent_id');
            $table->string('med_name');
            $table->string('med_time');
            $table->string('procedure');
            $table->integer('status');
           
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
