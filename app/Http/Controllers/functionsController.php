<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class functionsController extends Controller
{
    public function getStudents(Request $request){
        $auxiliary = $request->json()->get('auxiliary');
        $announcement = $request->json()->get('announcement');
        $postulant = DB::select('
        select *
        from "postulantEnable"
        where "postulantEnable".auxiliary = ? and "postulantEnable".announcement = ?', 
        [$auxiliary, $announcement]);
        return $postulant;
    }

    public function getPercentage(Request $request){
        $auxiliary = $request->json()->get('auxiliary');
        $announcement = $request->json()->get('announcement');
        $percentageAuxiliary = DB::select('
        select *
        from "percentageAuxiliary"
        where "percentageAuxiliary".auxiliary = ? and "percentageAuxiliary".id_announcement = ?', 
        [$auxiliary, $announcement]);
        return $percentageAuxiliary;
    }
}
