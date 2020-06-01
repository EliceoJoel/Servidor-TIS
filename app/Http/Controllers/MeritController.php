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
        
    //     $merit = Merit::where('id_announcement','=',$idConv)
    //     ->where('name_announcement', '=', $nameConv)
    //      ->where('name', '=', $nameMerit)
    //    ->update( $request->all());
    $porcentajes =Merit::select('number')->where('id_announcement', '=', $idConv)
    ->get();
    $suma = 0;
    
   
    foreach ($porcentajes as $oneporcentaje) {
       $suma = $suma + $oneporcentaje->number;
   }
   $queryPreviewPercentage = Merit::select('number')
   ->where('id_announcement','=',$idConv)
    ->where('name', '=', $nameMerit)
  ->get();
  //return $queryPreviewPercentage;
            $porcentajeAnterior = 0;
            foreach ($queryPreviewPercentage as $oldporcentaje) {
                    $porcentajeAnterior = $porcentajeAnterior + $oldporcentaje->number;
            }
    $residuopercentage = $puntaje -$porcentajeAnterior;
       if($residuopercentage + $suma >100){
        $merit = 'false';
          }else {
            // $merit = Merit::where('id_announcement','=',$idConv)
            //                         ->where('name', '=', $nameMerit)
            //                         ->update(['number' => $puntaje]);
                 $merit = Merit::where('id_announcement','=',$idConv)
        ->where('name_announcement', '=', $nameConv)
         ->where('name', '=', $nameMerit)
       ->update( $request->all());
       
          }
                   return $merit;                              
          
    }
    

     public function getByNameAnnouncement($name){
        $merit = Merit::where("name_announcement","=",$name)->get();
        return $merit;
    }
    public function getByAnnouncement(Request $request){
        $announcement = $request->id_announcement;
        $merit =Merit::where('id_announcement','=',$announcement)
                       ->where('number','>', 0)->get();

        return $merit;
    }
    public function delete(Request $request){
        $percentageId = $request->id_percentage;
        $merit = Merit::where('id','=',$percentageId)
                        ->update(['number' => 0]);;

        return $merit;
    }
    public function endConfiguration(Request $request){
        $announcement = $request->id_announcement;
        $porcentajes =Merit::select('number')->where('id_announcement', '=', $announcement)
        ->get();
       
        $suma = 0;
        foreach ($porcentajes as $oneporcentaje) {
           $suma = $suma + $oneporcentaje->number;
       }
       //return $suma;
       if($suma == 100){
            $merit ='true';
       }else{
           $merit = 'false';
       }
        return $merit;
    }
}
