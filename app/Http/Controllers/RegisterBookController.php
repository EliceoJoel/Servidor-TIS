<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterBook;

class RegisterBookController extends Controller
{
    public function getAll(){
        $registerBook = RegisterBook::all();
        return $registerBook;
    }

    public function add(Request $request){
        $registerBook = RegisterBook::create($request->all());
        return $registerBook;
    }

    public function get($id){
        $registerBook = RegisterBook::find($id);
        return $registerBook;
    }

    public function edit($id, Request $request){
        $registerBook =$this->get($id);
        $registerBook->fill($request->all())->save();
        return $registerBook;
    }

    public function delete($id){
        $registerBook = $this->get($id);
        $registerBook->delete();
        return $registerBook;
    }



    public function verify(Request $request){
        
       // $registerBook = RegisterBook::create($request->all());

        $CodigoSys = $request->codSis;
        $Convocatoria = $request->conv;
        $postulantEnable = RegisterBook::where('sis_code', '=', $CodigoSys)->where('announcement','=',$Convocatoria)
        ->get();

        return $postulantEnable;
    }

}
