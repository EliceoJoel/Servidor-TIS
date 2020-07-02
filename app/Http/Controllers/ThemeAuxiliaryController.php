<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThemeAuxiliary;
class ThemeAuxiliaryController extends Controller
{
    public function add(Request $request){
       $announcement = $request->id_announcement;
       $name= $request->name;
       $query = ThemeAuxiliary::select('name')->where('name', '=', $name)
       ->where('id_announcement', '=', $announcement)
       ->get();
       if($query->isEmpty()){
        $themeAuxiliary = ThemeAuxiliary::create($request->all());
    }else{
         $themeAuxiliary = 'false';
    }
        
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
     public function delete(Request $request){
        $theme = $request->id_theme;
        $deleteTheme =  ThemeAuxiliary::where('id','=',$theme)->delete();

        return $deleteTheme;
    }
}
