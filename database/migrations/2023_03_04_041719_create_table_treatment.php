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
        Schema::create('treatment', function (Blueprint $table) {
          $table->string('no_kwitansi')->primary();
          $table->string('description')->nullable();
          $table->date('date');
          $table->integer('price');
          $table->unsignedInteger('patient_id');
          $table->foreign('patient_id')->references('id')->on('patient');
          $table->unsignedInteger('dentist_id');
          $table->foreign('dentist_id')->references('id')->on('dentist');
          $table->string('type');
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
        Schema::dropIfExists('treatment');
    }
};
