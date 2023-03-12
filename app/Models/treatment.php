<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
  use HasFactory;
  protected $fillable = [
    'no_kwitansi',
    'description',
    'date',
    'price',
    'patient_id',
    'dentist_id',
    'type'
  ];


}
