<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 
        'last_name', 
        'gender', 
        'age',
        'date_of_birth', 
        'stablishment', 
        'status', 
        'group_id',
        'current_level',
        'observations'
    ];

}
