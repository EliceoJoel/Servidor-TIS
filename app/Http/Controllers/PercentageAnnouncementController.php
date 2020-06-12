<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\PercentageAnnouncement;
class PercentageAnnouncementController extends Controller
{
    public function getAll(){
        $percentageAnnouncement = PercentageAnnouncement::all();
        return $percentageAnnouncement;
    }

    public function add(Request $request){
       
        $convocatoria =  $request->id_announcement;
        $tipo =  $request->type;
        $nota =  $request->percentage;
        $superaelmaximo = false;
        //$validation = false
        $consulta = PercentageAnnouncement::where('id_announcement','=',$convocatoria)
                                        ->where('type', '=', $tipo)
                                            ->get();
          $porcentajes =PercentageAnnouncement::select('percentage')->where('id_announcement', '=', $convocatoria)
         ->get();
         $suma = 0;
         
        
         foreach ($porcentajes as $oneporcentaje) {
            $suma = $suma + $oneporcentaje->percentage;
        }
        $queryPreviewPercentage = PercentageAnnouncement::select('percentage')
                                                        ->where('id_announcement','=',$convocatoria)
                                                         ->where('type', '=', $tipo)
                                                       ->get();
        $porcentajeAnterior = 0;
        foreach ($queryPreviewPercentage as $oldporcentaje) {
            $porcentajeAnterior = $porcentajeAnterior + $oldporcentaje->percentage;
        }
        $residuopercentage = $nota -$porcentajeAnterior;
        
    // $oldPercentage = $queryPreviewPercentage->percentage;                                           
    //   return $queryPreviewPercentage;
      
          if ($consulta->isEmpty()) {
              if($suma+$nota>100){
                $PercentageAnnouncement = 'false';
                    }else {
                        $PercentageAnnouncement = PercentageAnnouncement::create($request->all());
           }} else {
            if($residuopercentage + $suma >100){
                $PercentageAnnouncement = 'false';
                        }else {
            $PercentageAnnouncement = PercentageAnnouncement::where('id_announcement','=',$convocatoria)
                                                         ->where('type', '=', $tipo)
                                                         ->update(['percentage' => $nota]);
           // $percentageAuxiliary = 'hola';
                                               
         }         
        }
   
        return $PercentageAnnouncement;   
    }
    public function getByAnnouncement(Request $request){
        $announcement = $request->id_announcement;
        $configAnnouncement =PercentageAnnouncement::where('id_announcement','=',$announcement)->get();

        return $configAnnouncement;
    }
    public function delete(Request $request){
        $percentageId = $request->id_percentage;
        $deletePercentage = PercentageAnnouncement::where('id','=',$percentageId)->delete();

        return $deletePercentage;
    }
}
