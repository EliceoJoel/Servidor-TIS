<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auxiliary;
class AuxiliaryController extends Controller
{
    public function add(Request $request){
      $announcement = $request->id_announcement ;
      $item = $request->item; 
      $name = $request->name; 
      $queryItem = Auxiliary::select('item')->where('item', '=', $item)
      ->where('id_announcement', '=', $announcement)
      ->get();
      $queryName = Auxiliary::select('name')->where('name', '=', $name)
      ->where('id_announcement', '=', $announcement)
      ->get();
      if ($queryItem->isEmpty()){
          if ($queryName->isEmpty()){
              $auxiliary = Auxiliary::create($request->all());
          }else{
              $auxiliary = 'nombre';
          }
      }else{
          $auxiliary = 'item'; 
      }
        
        return $auxiliary;
    }
    
    public function getAll(){
        $auxiliary =Auxiliary::all();
        return $auxiliary;
    }

    public function get($id){
        $auxiliary = Auxiliary::find($id);
        return $auxiliary;
    }
     
    public function search(Request $request){
        
        // $registerBook = RegisterBook::create($request->all());
 
         
         $announcement = $request->id_announcement;
         $auxiliary = Auxiliary::where('id_announcement','=',$announcement)
         ->get();
 
         return $auxiliary;
     }
     public function delete(Request $request){
        $auxiliary = $request->id_auxiliary;
        $deleteAux =  Auxiliary::where('id','=',$auxiliary)->delete();

        return $deleteAux;
    }
}
