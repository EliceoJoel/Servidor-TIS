<?php

namespace App\Http\Controllers;
use App\Laboratory_score;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class labScoreController extends Controller
{
    public function add(Request $request){
        $postulantScore = Laboratory_score::create($request->all());
        return $postulantScore;
    }
}
