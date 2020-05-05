<?php

namespace App\Http\Controllers;
use App\postulantScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postulantScoreController extends Controller
{
    public function getAll(){
        $postulantScore = postulantScore::all();
        return $postulantScore;
    }

    public function edit($id, Request $request){
        $score = $request->get('score');
        $score_oral = $request->get('score_oral');
        $results = DB::update('
        update "postulant_scores" 
        set score=? , score_oral=? 
        where id_postulant = ?', 
        [$score,$score_oral,$id]);
    }

    public function score(Request $request){
        $score = $request->get('id_postulant');
        $score = $request->get('score');
        $score_oral = $request->get('score_oral');
        $results = DB::update('
        update "postulant_scores" 
        set score=? , score_oral=? 
        where id_postulant = ?', 
        [$score,$score_oral,$id]);
    }
}
