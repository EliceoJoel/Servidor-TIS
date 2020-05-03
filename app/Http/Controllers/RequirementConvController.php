<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequirementConv;
class RequirementConvController extends Controller
{
  
    public function add(Request $request){
        $requirementConv = RequirementConv::create($request->all());
        return $requirementConv;
    }
    
}
