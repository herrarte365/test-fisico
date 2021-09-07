<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_results extends Model
{
    use HasFactory;
    protected $fillable = ['general_score', 'general_level', 'ps_test_athlete_id'];

}
