<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
  use HasFactory;
  protected $fillable = [
    // 'no_kwitansi',
    // 'price',
    'date',
    'patient_id',
    'dentist_id',
    'subjective',
    'objective',
    'assessment',
    'plan',
  ];


}
