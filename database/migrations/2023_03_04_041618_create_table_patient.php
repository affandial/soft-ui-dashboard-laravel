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
    Schema::create('patients', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->enum('gender', ['pria', 'wanita']);
      $table->string('phone_no')->unique();
      $table->string('email')->unique()->nullable();
      $table->string('address')->nullable();
      $table->date('birthdate')->nullable();
      $table->text('allergy')->nullable();
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
    Schema::dropIfExists('patient');
  }
};
