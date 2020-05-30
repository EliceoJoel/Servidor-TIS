<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfigAnnouncement;
class ConfigAnnouncementController extends Controller
{
    public function getAll(){
        $configAnnouncement = ConfigAnnouncement::all();
        return $configAnnouncement;
    }

    public function add(Request $request){
        $configAnnouncement = ConfigAnnouncement::create($request->all());
        return $configAnnouncement;
    }

}
