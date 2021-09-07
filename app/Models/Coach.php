<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'number_phone', 'user_id'];

    #ID DEL COACH SEGUN USUARIO
    public static function coacheID()
    {
        $coache = Coach::where('user_id', '=', Auth::id())->select('id')->first();
        return $coache->id;
    }

    #LISTA DE GRUPOS ASIGNADOS AL COACH.
    public static function gruposAsignados($coacheId)
    {
        $gruposList = array();
                
        $grupos = Group::where('coache_id', '=', $coacheId)
                    ->select('id')
                    ->get();

        foreach($grupos as $index => $grupo){
            $gruposList[$index] = $grupo->id; 
        }

        return $gruposList;
    }

}
