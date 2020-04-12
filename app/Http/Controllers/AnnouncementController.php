<?php

namespace Postulant\Http\Controllers;

use Illuminate\Http\Request;
use Postulant\Announcement;

class AnnouncementController extends Controller
{
    public function getAll(){
        $announcement = Announcement::all();
        return $announcement;
    }

    public function add(Request $request){
        $announcement = Announcement::create($request->all());
        return $announcement;
    }

    public function get($id){
        $announcement = Announcement::find($id);
        return $announcement;
    }

    public function edit($id, Request $request){
        $announcement =$this->get($id);
        $announcement->fill($request->all())->save();
        return $announcement;
    }

    public function delete($id){
        $announcement = $this->get($id);
        $announcement->delete();
        return $announcement;
    }
}
