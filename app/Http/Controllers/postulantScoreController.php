<?php

namespace App\Http\Controllers;
use App\postulantScore;
use Illuminate\Http\Request;

class postulantScoreController extends Controller
{
    public function getAll(){
        $postulantScore = postulantScore::all();
        return $postulantScore;
    }
}
