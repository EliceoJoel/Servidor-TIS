<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeritosRegister;

class MeritosRegisterController extends Controller
{
    public function add(Request $request){
        $id_merito = $request->json()->get('id_merito');
        $id_posttulant = $request->json()->get('id_postulant');
        if (MeritosRegister::where('id_merito', '=', $id_merito)->where('id_postulant', '=', $id_posttulant)->exists()) {
            MeritosRegister::where('id_merito', $id_merito)->where('id_postulant', '=', $id_posttulant)->delete();
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }else{
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }
    }
}
