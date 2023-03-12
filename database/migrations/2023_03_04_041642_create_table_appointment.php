<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
          $table->increments('id');
          $table->date('date');
          $table->unsignedInteger('patient_id');
          $table->foreign('patient_id')->references('id')->on('patient');
          $table->unsignedInteger('status_id');
          $table->foreign('status_id')->references('id')->on('appointmentStatus');
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
        Schema::dropIfExists('appointment');
    }
};
