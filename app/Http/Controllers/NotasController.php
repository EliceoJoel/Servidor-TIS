<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notas;

class NotasController extends Controller
{
    public function addMerito(Request $request){

        $notaMerito = $request->json()->get('notaMerito');
        $idPostulant = $request->json()->get('idPostulant');

        if (Notas::where('id_postulant', '=', $idPostulant)->exists()) {
            Notas::where('id_postulant', $idPostulant)
                   ->update(['nota_merito' => $notaMerito]);
        }else{
            $nota = new Notas;
            $nota->id_postulant = $idPostulant;
            $nota->nota_merito = $notaMerito;
            $nota->nota_conocimiento = 0;
            $nota->nota_final = 0;
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

}
