<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImportantDate;

class ImportantDateController extends Controller
{
    public function getAll(){
        $importantDate = ImportantDate::all();
        return $importantDate;
    }

    public function add(Request $request){
        $importantDate = ImportantDate::create($request->all());
        return $importantDate;
    }
}
