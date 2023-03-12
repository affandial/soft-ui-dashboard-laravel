<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dentist extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'gender',
    'address',
    'phone',
    'email',
    'specialty',
  ];
}
