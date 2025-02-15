<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class functionsController extends Controller
{
    public function getStudents(Request $request){
        $auxiliary = $request->json()->get('auxiliary');
        $announcement = $request->json()->get('announcement');
        $postulant = DB::select('
        select *
        from "postulantEnable"
        where "postulantEnable".auxiliary = ? and "postulantEnable".announcement = ? and enable = true', 
        [$auxiliary, $announcement]);
        return $postulant;
    }

    public function getPercentage(Request $request){
        $auxiliary = $request->json()->get('auxiliary');
        $announcement = $request->json()->get('announcement');
        $percentageAuxiliary = DB::select('
        select *
        from "percentageAuxiliary"
        where "percentageAuxiliary".auxiliary = ? and "percentageAuxiliary".id_announcement = ?', 
        [$auxiliary, $announcement]);
        return $percentageAuxiliary;
    }

    public function getAnnouncements($id){
        $announcement = DB::select('
        select announcement.*
        from announcement,user_announcement
        where   announcement.id = user_announcement."idAnnouncement" 
        and user_announcement."idUser" = ?
		and type = ?
        group by announcement."id"
        ', 
        [$id,'Docencia']);
        return $announcement;
    }
    public function getAnnouncementsUser($id){
        $announcement = DB::select('
        select distinct announcement.*
        from announcement,user_announcement
        where   announcement.id = user_announcement."idAnnouncement" 
        and user_announcement."idUser" = ?', 
        [$id]);
        return $announcement;
    }

    public function getAnnouncementsLab($id){
        $announcement = DB::select('
        select announcement.*
        from announcement,user_announcement
        where   announcement.id = user_announcement."idAnnouncement" 
        and user_announcement."idUser" = ?
		and type = ?
        group by announcement."id"
        ', 
        [$id,'Laboratorio']);
        return $announcement;
    }

    public function getUserAuxiliary($id,$conv){
        $announcement = DB::select('
            select auxiliary.id, auxiliary.id_announcement, 
		    auxiliary.name, "idUser"
	        from auxiliary,user_announcement
	        where auxiliary.id = user_announcement."idAuxiliary" and "idUser" = ?
		    and "id_announcement" = ?
	        group by auxiliary.id, "idUser"
        ', 
        [$id,$conv]);
        return $announcement;
    }

    public function getUserTheme($id,$conv,$aux){
        $announcement = DB::select('
        select percentage, "percentageAuxiliary".id, theme
        from "percentageAuxiliary" , auxiliary, user_announcement
        where "percentageAuxiliary".auxiliary = name and user_announcement."idUser" = ?
        and auxiliary.id_announcement = user_announcement."idAnnouncement" and user_announcement."idAnnouncement" = ?
        and user_announcement."idAuxiliary" = auxiliary.id and user_announcement."idAuxiliary" = ?
		and user_announcement."idTheme" = "percentageAuxiliary".id
        group by "percentageAuxiliary".id,name
        ', 
        [$id,$conv,$aux]);
        return $announcement;
    }

    public function getAuxConv($id){
        $announcement = DB::select('
        select *
        from auxiliary
        where auxiliary.id_announcement = ?', 
        [$id]);
        return $announcement;
    }

    public function getTheme(Request $request){
        $auxiliary = $request->json()->get('auxiliary');
        $announcement = DB::select('
        select *
        from "percentageAuxiliary"
        where auxiliary = ?', 
        [$auxiliary]);
        return $announcement;
    }

    public function getFinalScores($id){
        $scores = DB::select('
        SELECT laboratory_socres."idPostulant", sum(score*percentage/100), "postulantEnable".name
        FROM laboratory_socres , "percentageAuxiliary" , "postulantEnable"
        WHERE "idtTheme" = "percentageAuxiliary".id and "postulantEnable".id = laboratory_socres."idPostulant"
		and "postulantEnable".id = ?
        group by "postulantEnable".id,laboratory_socres."idPostulant"
        ',
        [$id]);
        return $scores;
    }

    public function getTheory($id,$pos){
        $announcement = DB::select('
        select score, score_oral, id_postulant, "percentageKnowledgeDoc".type, percentage
        from postulant_scores, "postulantEnable", "percentageKnowledgeDoc", announcement
        where postulant_scores.id_postulant = "postulantEnable".id and "postulantEnable".announcement = announcement.name 
        and announcement.id = "percentageKnowledgeDoc".id_announcement and announcement.id = ? and id_postulant = ?
        ', 
        [$id,$pos]);
        return $announcement;
    }

    public function getAverage($id){
        $announcement = DB::select('
        select "postulantEnable".auxiliary, "postulantEnable".name ,notas.nota_final
        from notas, "postulantEnable", announcement
        where "postulantEnable".id = notas.id_postulant and announcement.name = "postulantEnable".announcement
        and announcement.id = ?
        ', 
        [$id]);
        return $announcement;
    }

    public function updateRol($id,$rol){
        $announcement = DB::update('
        update users
        set "idRol" = ? 
        where id = ?
        ', 
        [$rol,$id]);
        return $announcement;
    }

    public function getThemeAux($id){
        $theme = DB::select('
        select "percentageAuxiliary".theme, auxiliary.id, "percentageAuxiliary".id  
        from "percentageAuxiliary" , auxiliary
        where "percentageAuxiliary".auxiliary = auxiliary.name and auxiliary.id = ?
		order by theme
        ', 
        [$id]);
        return $theme;
    }
    public function getPostulantEnable($id){
        $postulant = DB::select('
        select pe.name, a.name as aux, pe.id
        from "postulantEnable" as pe, auxiliary a
        where pe.auxiliary = a.name and a.id = ? and pe.enable = true
        order by pe.id
        ', 
        [$id]);
        return $postulant;
    }

    public function getPostulantLabScores($id){
        $postulant = DB::select('
        select ls."idPostulant", ls.score, pe.name,pa.id as idTheme, a.id as idAux
        from laboratory_socres as ls, "postulantEnable" as pe, "percentageAuxiliary" as pa, auxiliary as a
        where ls."idPostulant" = pe.id and pa.id = ls."idtTheme" and a.name = pe.auxiliary and a.id = ?
        order by "idPostulant" , pa.theme
        ', 
        [$id]);
        return $postulant;
    }

    public function CountTheme($id){
        $sum = DB::select('
        select count("idPostulant")
        from laboratory_socres
        where "idPostulant" = ?
        Group by "idPostulant"
        ', 
        [$id]);
        return $sum;
    }
}


