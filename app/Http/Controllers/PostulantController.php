<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulant;

class PostulantController extends Controller
{
    public function getAll(){
        $postulant = Postulant::all();
        return $postulant;
    }

    public function add(Request $request){
        $postulant = Postulant::create($request->all());
        return $postulant;
    }

    public function get($id){
        $postulant = Postulant::find($id);
        return $postulant;
    }

    public function edit($id, Request $request){
        $postulant =$this->get($id);
        $postulant->fill($request->all())->save();
        return $postulant;
    }

    public function delete($id){
        $postulant = $this->get($id);
        $postulant->delete();
        return $postulant;
    }
}
