<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeritosRegister;

class MeritosRegisterController extends Controller
{
    public function add(Request $request){
        $idPostulant = $request->json()->get('id_postulant');
        if (MeritosRegister::where('id_postulant', '=', $idPostulant)->exists()) {
            MeritosRegister::where('id_postulant', $idPostulant)->delete();
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }else{
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }
    }
}
