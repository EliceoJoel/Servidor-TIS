<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notas;
use App\Announcement;
use App\PercentageAnnouncement;

class NotasController extends Controller
{
    public function addMerito(Request $request){

        $notaMerito = $request->json()->get('notaMerito');
        $idPostulant = $request->json()->get('idPostulant');
        $announcement = $request->json()->get('announcement');

        if (Notas::where('id_postulant', '=', $idPostulant)->exists()) {
            $percentageMerit = $this->getPercentage($announcement, 'merito');
            $percentageKnow = $this->getPercentage($announcement, 'conocimiento');
            $notas = Notas::where('id_postulant','=',$idPostulant)->get();
            $notaConocimiento = ($notas[0]->nota_conocimiento)*$percentageKnow/100;
            $notaMerit = $notaMerito*($percentageMerit/100);
            $notaFinal = $notaConocimiento + $notaMerit;
            Notas::where('id_postulant', $idPostulant)
                   ->update(['nota_merito' => $notaMerito, 'nota_final'=> round($notaFinal, 2)]);
        }else{
            $percentageMerit = $this->getPercentage($announcement, 'merito');
            $notaFinal = $notaMerito*($percentageMerit/100);
            $nota = new Notas;
            $nota->id_postulant = $idPostulant;
            $nota->nota_merito = $notaMerito;
            $nota->nota_conocimiento = 0;
            $nota->nota_final = round($notaFinal, 2);
            $nota->save();
        }
    }

    public function getMeritos(){
        $datos = DB::select('
          select "postulantEnable".name, "postulantEnable".auxiliary, "postulantEnable".announcement, "notas".nota_merito, "notas".id
          from public."postulantEnable", public."notas"
          where "postulantEnable".id = "notas".id_postulant');
        return $datos;
    }

    public function getAllNotes(){
        $datos = DB::select('
          select "notas".id, "notas".nota_merito, "notas".nota_conocimiento, "notas".nota_final,
                 "postulantEnable".name, "postulantEnable".auxiliary, "postulantEnable".announcement
          from public."postulantEnable", public."notas"
          where "postulantEnable".id = "notas".id_postulant and nota_merito>0 and nota_conocimiento>0');
        return $datos;
    }

    public function getPercentage($conv, $type){
        $Announcement = Announcement::where('name','=',$conv)->get();
        $id = $Announcement[0]->id;
        $percentageMerito = PercentageAnnouncement::where('id_announcement','=',$id)
                                                  ->where('type','=',$type)->get();
        $percentage = $percentageMerito[0]->percentage;
        return $percentage;
    }

    public function addConocimiento(Request $request){

        $notaConocimiento = $request->json()->get('notaConocimiento');
        $idPostulant = $request->json()->get('idPostulant');
        $announcement = $request->json()->get('announcement');

        $percentageMerit = $this->getPercentage($announcement, 'merito');
        $percentageKnow = $this->getPercentage($announcement, 'conocimiento');

        if (Notas::where('id_postulant', '=', $idPostulant)->exists()) {
            $notas = Notas::where('id_postulant','=',$idPostulant)->get();
            $notaMerit = ($notas[0]->nota_merito)*$percentageMerit/100;
            $score = $notaConocimiento*($percentageKnow/100);
            $notaFinal = $score + $notaMerit;
            Notas::where('id_postulant', $idPostulant)
                   ->update(['nota_conocimiento' => $notaConocimiento, 'nota_final'=> round($notaFinal, 2)]);
        }else{
            $notaFinal = $notaConocimiento*($percentageKnow/100);
            $nota = new Notas;
            $nota->id_postulant = $idPostulant;
            $nota->nota_conocimiento = $notaConocimiento;
            $nota->nota_merito = 0;
            $nota->nota_final = round($notaFinal, 2);
            $nota->save();
        }
    }
}
