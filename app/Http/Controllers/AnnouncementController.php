<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function add(Request $request){
<<<<<<< HEAD
        $filename = $request->file('filepdf') -> getClientOriginalName();
        $announcement = $request->file('filepdf')->storeAs('filepdf', $filename);
        $announcement = Announcement::create($request->all());
        return $announcement;
    }
    
    public function getAll(){
        $announcement = Announcement::all();
        return $announcement;
    }

    public function get($id){
        $announcement = Announcement::find($id);
=======
        //$announcement = Announcement::create($request->input('name'));
        //$announcement = Announcement::create($request->input('year'));
        //$announcement = Announcement::create($request->input('type'));
        //$announcement = Announcement::create($request->input('departament'));
        //$announcement = Announcement::create($request->input('auxiliary'));
        //$announcement = Announcement::create($request->input('file'));
        $announcement = $request->file('file')->store('file');
        $announcement = Announcement::create($request->all());
       
        // if($request -> has('file')){

        //      $announcement ->add(['file' => $request ->file('file') -> store ('announcementpost   ','public')]);  
         
        // } 
>>>>>>> controlador funcionando
        return $announcement;
    }
}
<<<<<<< HEAD
=======
namespace Announcement\Http\Controllers;

use Illuminate\Http\Request;
use Announcement\Announcement;

class AnnouncementController extends Controller
{
    public function upload(Request $request){
        $announcement = announcement::create($request->all());
        return $announcement;
    }
    public function getAll(){
        $announcement = Announcement::all();
        return $announcement;
    }
}
>>>>>>> aumentando controlador, ruta y announcement.php para announcement
=======
>>>>>>> arreglos en conflictos announcement
