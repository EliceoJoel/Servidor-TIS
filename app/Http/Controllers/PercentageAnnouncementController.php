<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\PercentageAnnouncement;
class PercentageAnnouncementController extends Controller
{
    public function getAll(){
        $percentageAnnouncement = PercentageAnnouncement::all();
        return $percentageAnnouncement;
    }

    public function add(Request $request){
        $percentageAnnouncement = PercentageAnnouncement::create($request->all());
        return $percentageAnnouncement;
    }
}
