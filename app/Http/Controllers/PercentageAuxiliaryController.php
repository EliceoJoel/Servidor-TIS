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
        //$validation = false
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
        $queryPreviewPercentage = PercentageAuxiliary::select('percentage')
                                                        ->where('id_announcement','=',$convocatoria)
                                                         ->where('auxiliary', '=', $auxiliatura)
                                                        ->where('theme', '=', $tematica)->get();
        $porcentajeAnterior = 0;
        foreach ($queryPreviewPercentage as $oldporcentaje) {
            $porcentajeAnterior = $porcentajeAnterior + $oldporcentaje->percentage;
        }
        $residuopercentage = $nota -$porcentajeAnterior;
        
    // $oldPercentage = $queryPreviewPercentage->percentage;                                           
      //return $suma;
      
          if ($consulta->isEmpty()) {
              if($suma+$nota>100){
            $percentageAuxiliary = 'false';
                    }else {
            $percentageAuxiliary = PercentageAuxiliary::create($request->all());
           }} else {
            if($residuopercentage + $suma >100){
                             $percentageAuxiliary = 'false';
                        }else {
            $percentageAuxiliary = PercentageAuxiliary::where('id_announcement','=',$convocatoria)
                                                         ->where('auxiliary', '=', $auxiliatura)
                                                        ->where('theme', '=', $tematica)
                                                         ->update(['percentage' => $nota]);
           // $percentageAuxiliary = 'hola';
                                                        
         }
        }
    
          return $percentageAuxiliary;
        
            //         
            //              $percentageAuxiliary = 'false';
            //         }else {
            //             $percentageAuxiliary = PercentageAuxiliary::create($request->all());
            //         }
                 
            //     } else {
            //         if($residuopercentage + $suma >100){
            //              $percentageAuxiliary = 'false';
            //         }else {
            //              $percentageAuxiliary = PercentageAuxiliary::where('id_announcement','=',$convocatoria)
            //                                                   ->where('auxiliary', '=', $auxiliatura)
            //                                                  ->where('theme', '=', $tematica)
            //                                                   ->update(['percentage' => $nota]);
        
            //                    }
            //               }        
            //         }
            //   return $percentageAuxiliary;
        
  
     }
    
    public function getAll(){
        $percentageAuxiliary =PercentageAuxiliary::all();
        return $percentageAuxiliary;
    }
    public function getByAnnouncement(Request $request){
        $announcement = $request->id_announcement;
        $percentageAuxiliary =PercentageAuxiliary::where('id_announcement','=',$announcement)->get();

        return $percentageAuxiliary;
    }

    public function get($id){
        $percentageAuxiliary = PercentageAuxiliary::find($id);
        return $percentageAuxiliary;
    }
    
}
