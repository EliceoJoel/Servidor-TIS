<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PercentageKnowledgeDoc;
class PercentageKnowledgeDocController extends Controller
{
    public function getAll(){
        $percentageKnowledgeDoc = PercentageKnowledgeDoc::all();
        return $percentageKnowledgeDoc;
    }

    public function add(Request $request){
        $percentageKnowledgeDoc = PercentageKnowledgeDoc::create($request->all());
        return $percentageKnowledgeDoc;
    }
}
