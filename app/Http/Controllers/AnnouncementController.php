<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function add(Request $request){
    
        $announcement = $request->file('file')->store('file');
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
}
