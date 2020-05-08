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
}
