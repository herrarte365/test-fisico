<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ps_tests_athlete extends Model
{
    use HasFactory;
    protected $fillable = ['physical_test_id', 'athlete_id'];

}
