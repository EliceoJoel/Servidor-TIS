<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThemeAuxiliary;
class ThemeAuxiliaryController extends Controller
{
    public function add(Request $request){
      
        $themeAuxiliary = ThemeAuxiliary::create($request->all());
        return $themeAuxiliary;
    }
    
    public function getAll(){
        $themeAuxiliary =ThemeAuxiliary::all();
        return $themeAuxiliary;
    }

    public function get($id){
        $themeAuxiliary = ThemeAuxiliary::find($id);
        return $themeAuxiliary;
    }
     
    public function search(Request $request){
        
        // $registerBook = RegisterBook::create($request->all());
 
         
         $announcement = $request->id_announcement;
         $themeAuxiliary = ThemeAuxiliary::where('id_announcement','=',$announcement)
         ->get();
 
         return $themeAuxiliary;
     }
}
