<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PercentageAuxiliary;
class PercentageAuxiliaryController extends Controller
{
    public function add(Request $request){
      
        $percentageAuxiliary = PercentageAuxiliary::create($request->all());
        return $percentageAuxiliary;
    }
    
    public function getAll(){
        $percentageAuxiliary =PercentageAuxiliary::all();
        return $percentageAuxiliary;
    }

    public function get($id){
        $percentageAuxiliary = PercentageAuxiliary::find($id);
        return $percentageAuxiliary;
    }
}
