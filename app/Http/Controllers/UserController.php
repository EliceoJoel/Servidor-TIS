<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getStudentsScores(){
        $students = DB::select('
        select "postulantEnable".id, "postulantEnable".name, "postulantEnable".auxiliary, "postulantEnable".announcement,
               "postulantEnable".enable, "postulant_scores".score, "postulant_scores".score_oral
        from public."postulantEnable" , public."postulant_scores"
        where "postulantEnable".id = "postulant_scores".id_postulant');
        return $students;
    }

    public function updateScore($id){
        $results = DB::update('
        update "postulant_scores" 
        set score=? , score_oral=? 
        where id_postulant = ?', 
        [22,45,2]);
        return $id;
    }

}
