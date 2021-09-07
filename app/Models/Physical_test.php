<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physical_test extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'group_id'];
}
