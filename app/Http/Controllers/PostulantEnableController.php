<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostulantEnable;

class PostulantEnableController extends Controller
{
    public function getAll(){
        $postulantEnable = PostulantEnable::all();
        return $postulantEnable;
    }
    
    public function add(Request $request){
        $postulantEnable = PostulantEnable::create($request->all());
        return $postulantEnable;
     }
    // public function add(Request $request){
    //     $nombre= $request->name;
    //     //  update "postulantEnable" 
    //     $convocatoria= $request->announcement;
    //     $auxiliatura= $request->auxiliary;
    //     if(){
    //         $actualizacion = PostulantEnable::update('
    //             set enable=? , reason=? ', 
    //         [$enable,$reason]);
    //     }else{
    //           $postulantEnable = PostulantEnable::create($request->all());
    //     }
      
    //     return $postulantEnable;
    // }

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
    }
}
