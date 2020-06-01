<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PercentageKnowledgeDoc;
class PercentageKnowledgeDocController extends Controller
{
    public function getAll(){
        $percentageKnowledgeDoc = PercentageKnowledgeDoc::all();
        return $percentageKnowledgeDoc;
    }

    public function add(Request $request){
       
        $convocatoria =  $request->id_announcement;
        $tipo =  $request->type;
        $nota =  $request->percentage;
        $superaelmaximo = false;
        //$validation = false
        $consulta = PercentageKnowledgeDoc::where('id_announcement','=',$convocatoria)
                                        ->where('type', '=', $tipo)
                                            ->get();
          $porcentajes =PercentageKnowledgeDoc::select('percentage')->where('id_announcement', '=', $convocatoria)
         ->get();
         $suma = 0;
         
        
         foreach ($porcentajes as $oneporcentaje) {
            $suma = $suma + $oneporcentaje->percentage;
        }
        $queryPreviewPercentage = PercentageKnowledgeDoc::select('percentage')
                                                        ->where('id_announcement','=',$convocatoria)
                                                         ->where('type', '=', $tipo)
                                                       ->get();
        $porcentajeAnterior = 0;
        foreach ($queryPreviewPercentage as $oldporcentaje) {
            $porcentajeAnterior = $porcentajeAnterior + $oldporcentaje->percentage;
        }
        $residuopercentage = $nota -$porcentajeAnterior;
        
    // $oldPercentage = $queryPreviewPercentage->percentage;                                           
      //return $suma;
      
          if ($consulta->isEmpty()) {
              if($suma+$nota>100){
            $percentageKnowledgeDoc = 'false';
                    }else {
            $percentageKnowledgeDoc = PercentageKnowledgeDoc::create($request->all());
           }} else {
            if($residuopercentage + $suma >100){
                             $percentageKnowledgeDoc = 'false';
                        }else {
            $percentageKnowledgeDoc = PercentageKnowledgeDoc::where('id_announcement','=',$convocatoria)
                                                         ->where('type', '=', $tipo)
                                                         ->update(['percentage' => $nota]);
           // $percentageAuxiliary = 'hola';
                                               
         }         
        }
   
        return $percentageKnowledgeDoc;   
    }
    public function getByAnnouncement(Request $request){
        $announcement = $request->id_announcement;
        $percentageKnowledgeDoc =PercentageKnowledgeDoc::where('id_announcement','=',$announcement)->get();

        return $percentageKnowledgeDoc;
    }
    public function delete(Request $request){
        $percentageId = $request->id_percentage;
        $deletePercentage = PercentageKnowledgeDoc::where('id','=',$percentageId)->delete();

        return $deletePercentage;
    }
    public function endConfiguration(Request $request){
        $announcement = $request->id_announcement;
        $porcentajes =PercentageKnowledgeDoc::select('percentage')->where('id_announcement', '=', $announcement)
        ->get();
       
        $suma = 0;
        foreach ($porcentajes as $oneporcentaje) {
           $suma = $suma + $oneporcentaje->percentage;
       }
       
     
       if($suma == 100){
            $percentageKnowledgeDoc ='true';
       }else{
           $percentageKnowledgeDoc = 'false';
       }
        return $percentageKnowledgeDoc;
    }
}
