<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getStudentsScores(){
        $students = DB::select('
        select "postulantEnable".id_book, "postulantEnable".name, "postulantEnable".auxiliary, "postulantEnable".announcement,
               "postulantEnable".enable, "postulant_scores".score, "postulant_scores".score_oral
        from public."postulantEnable" , public."postulant_scores"
        where "postulantEnable".id_book = "postulant_scores".id_postulant');
        return $students;
    }

    public function updateScore($id){
        $results = DB::update('
        update "postulant_scores" 
        set score=? , score_oral=? 
        where id_postulant = ?', 
        [22,45,2]);
        return $id;
    }

    public function getAll(){
        $user = User::all();
        return $user;
    }

    public function add(Request $request){
        $request->request->add([
            'password' => Hash::make($request->input('password'))
        ]);
        $user = User::create($request->all());
        return $user;
    }

    public function get($id){
        $user = User::find($id);
        return $user;
    }

    public function edit($id, Request $request){
        $user =$this->get($id);
        $user->fill($request->all())->save();
        return $user;
    }

    public function delete($id){
        $user = $this->get($id);
        $user->delete();
        return $user;
    }

}
