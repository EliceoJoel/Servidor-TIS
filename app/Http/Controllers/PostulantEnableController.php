<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostulantEnable;

class PostulantEnableController extends Controller
{
<<<<<<< HEAD
    public function getAll(){
        $postulantEnable = PostulantEnable::all();
        return $postulantEnable;
    }

    public function add(Request $request){
        $postulantEnable = PostulantEnable::create($request->all());
        return $postulantEnable;
    }

    public function get($id){
        $postulantEnable = PostulantEnable::find($id);
        return $postulantEnable;
    }

    public function edit($id, Request $request){
        $postulantEnable =$this->get($id);
        $postulantEnable->fill($request->all())->save();
        return $postulantEnable;
    }

    public function delete($id){
        $postulantEnable = $this->get($id);
        $postulantEnable->delete();
        return $postulantEnable;
=======
    public function add(Request $request){
        $PostulantEnable = PostulantEnable::create($request->all());
        return $PostulantEnable;
    }

    public function getAll(){
        $PostulantEnable = PostulantEnable::all();
        return $PostulantEnable;
>>>>>>> cambios en ruta y en controladores
    }
}
