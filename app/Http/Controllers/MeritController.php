<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merit;
class MeritController extends Controller
{
    public function add(Request $request){
      
        $merit = Merit::create($request->all());
        return $merit;
    }
    
    public function getAll(){
        $merit =Merit::all();
        return $merit;
    }

    public function get($id){
        $merit = Merit::find($id);
        return $merit;
    }
     
    public function search(Request $request){
        
        // $registerBook = RegisterBook::create($request->all());
 
         
         $announcement = $request->id_announcement;
         $merit = Merit::where('id_announcement','=',$announcement)
         ->get();
 
         return $merit;
     }
     public function update(Request $request){
         $idConv = $request->id_announcement;
         $nameConv = $request->name_announcement;
         $nameMerit = $request->name;
         $tipo = $request->type;
         $puntaje = $request->number;
        
        $merit = Merit::where('id_announcement','=',$idConv)
        ->where('name_announcement', '=', $nameConv)
         ->where('name', '=', $nameMerit)
       // ->update( ['type' ,'number'  =>$tipo , $puntaje]);
       ->update( $request->all());
       
    }
    
}
