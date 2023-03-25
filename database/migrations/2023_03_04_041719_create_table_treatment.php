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
    Schema::create('treatments', function (Blueprint $table) {
      $table->increments('id');
      $table->date('date');
      // $table->integer('price');
      $table->unsignedInteger('patient_id');
      $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
      $table->unsignedInteger('dentist_id');
      $table->foreign('dentist_id')->references('id')->on('dentists')->onDelete("no action");
      $table->text('subjective')->nullable();
      $table->text('objective')->nullable();
      $table->text('assessment')->nullable();
      $table->text('plan')->nullable();
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
