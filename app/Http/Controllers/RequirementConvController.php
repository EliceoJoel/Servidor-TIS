<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequirementConv;
class RequirementConvController extends Controller
{
  
    public function add(Request $request){
        $requirementConv = RequirementConv::create($request->all());
        return $requirementConv;
    }
    
    public function getReq(Request $request){
        
     
 
         $Convocatoria = $request->conv;
         $postulantReq = RequirementConv::where('name_announcement','=',$Convocatoria)
         ->get();
 
         return $postulantReq;
     }
     public function delete(Request $request){
        $requirement = $request->id_requirement;
        $deleteReq =  RequirementConv::where('id','=',$requirement)->delete();

        return $deleteReq;
    }
}
