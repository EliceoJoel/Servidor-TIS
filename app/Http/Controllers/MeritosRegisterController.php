<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeritosRegister;

class MeritosRegisterController extends Controller
{
    public function add(Request $request){
        $mertitosRegister = MeritosRegister::create($request->all());
        return $mertitosRegister;
    }
}
