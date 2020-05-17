<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PercentageAuxiliary;

class PercentageAuxiliaryController extends Controller
{
    public function add(Request $request){
       
        $convocatoria =  $request->id_announcement;
        $auxiliatura =  $request->auxiliary;
        $tematica =  $request->theme;
        $nota =  $request->percentage;
        $superaelmaximo = false;
        $consulta = PercentageAuxiliary::where('id_announcement','=',$convocatoria)
                                        ->where('auxiliary', '=', $auxiliatura)
                                        ->where('theme', '=', $tematica)
                                            ->get();
          $porcentajes =PercentageAuxiliary::select('percentage')->where('auxiliary', '=', $auxiliatura)
         ->get();
         $suma = 0;
        
         foreach ($porcentajes as $oneporcentaje) {
            $suma = $suma + $oneporcentaje->percentage;
        }
      //return $suma;
      
          if ($consulta->isEmpty()) {
            $percentageAuxiliary = PercentageAuxiliary::create($request->all());
           } else {
         
            $percentageAuxiliary = PercentageAuxiliary::where('id_announcement','=',$convocatoria)
                                                         ->where('auxiliary', '=', $auxiliatura)
                                                        ->where('theme', '=', $tematica)
                                                         ->update(['percentage' => $nota]);
           // $percentageAuxiliary = 'hola';
                                                        
         } // return $percentageAuxiliary;
  
             }
    
    public function getAll(){
        $percentageAuxiliary =PercentageAuxiliary::all();
        return $percentageAuxiliary;
    }

    public function get($id){
        $percentageAuxiliary = PercentageAuxiliary::find($id);
        return $percentageAuxiliary;
    }
    
}
