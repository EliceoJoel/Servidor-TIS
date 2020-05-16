<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function add(Request $request){
        $originalname = $request->file('filepdf') -> getClientOriginalName();
        $announcement = $request->file('filepdf')->storeAs('file', $originalname);
        $announcement = Announcement::create($request->all());
        return $announcement;
    }
    
    public function getAll(){
        $announcement = Announcement::all();
        return $announcement;
    }

    public function get($id){
        $announcement = Announcement::find($id);
        return $announcement;
    }
    
    public function search(Request $request){
        
        // $registerBook = RegisterBook::create($request->all());
 
         
         $Convocatoria = $request->conv;
         $announcement = Announcement::where('name','=',$Convocatoria)
         ->get();
 
         return $announcement;
     }
}
