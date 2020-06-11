<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeritosRegister;

class MeritosRegisterController extends Controller
{
    public function add(Request $request){
        $id_merito = $request->json()->get('id_merito');
        if (MeritosRegister::where('id_merito', '=', $id_merito)->exists()) {
            MeritosRegister::where('id_merito', $id_merito)->delete();
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }else{
            $mertitosRegister = MeritosRegister::create($request->all());
            return $mertitosRegister;
        }
    }
}
