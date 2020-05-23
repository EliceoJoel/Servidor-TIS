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
}
