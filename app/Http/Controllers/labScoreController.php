<?php

namespace App\Http\Controllers;
use App\Laboratory_score;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class labScoreController extends Controller
{
    public function add(Request $request){
        $idPostulant = $request ->get('idPostulant');
        $idtTheme = $request ->get('idtTheme');
        $score = $request ->get('score');
        if (Laboratory_score::where('idPostulant', '=', $idPostulant)->exists()){
            DB::update('
                update laboratory_socres
                set score= ?
                where "idPostulant" = ? and "idtTheme" = ?'
            ,[$score,$idPostulant,$idtTheme]);
        }
        else{
            $postulantScore = Laboratory_score::create($request->all());
            return $postulantScore;
        }
    }
}
