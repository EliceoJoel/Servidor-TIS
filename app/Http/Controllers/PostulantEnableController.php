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
    
    // public function add(Request $request){
    //     $postulantEnable = PostulantEnable::create($request->all());
    //     return $postulantEnable;
    //  }
    public function add(Request $request){
        $nombre= $request->name;
        $convocatoria= $request->announcement;
        $auxiliatura= $request->auxiliary;
        $habilitado = $request->enable;
        $motivo = $request->reason;
        $consulta = PostulantEnable::where('name','=',$nombre)
        ->where('auxiliary', '=', $auxiliatura)
        ->where('announcement', '=', $convocatoria)
        ->get();
        if ($consulta->isEmpty()) {
            $postulantEnable = PostulantEnable::create($request->all());
           } else {
         
            $postulantEnable = PostulantEnable::where('name','=',$nombre)
                                                         ->where('auxiliary', '=', $auxiliatura)
                                                        ->where('announcement', '=', $convocatoria)
                                                         ->update(['enable' => $habilitado , 'reason' => $motivo]);
          
                                                        
         }  return $postulantEnable;
      
      
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
    }

    public function getByTrue(Request $request){
        $announcement = $request->json()->get('name');
        $postulantEnable = PostulantEnable::where("enable","=",true)->where("announcement", "=", $announcement)->get();
        return $postulantEnable;
    }
}
