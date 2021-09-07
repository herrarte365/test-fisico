<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ps_detail extends Model
{
    use HasFactory;
    protected $fillable = ['result', 'level', 'ps_test_athlete_id', 'test_id', 'points'];
}
