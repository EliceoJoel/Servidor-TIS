<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_announcement;

class UserAnnouncementController extends Controller
{
    public function saveAnnouncement(Request $request)
    {
        user_announcement::create([
            'idAnnouncement' => $request->json()->get('idAnnouncement'),
            'idUser' => $request->json()->get('idUser'),
        ]);
    }
}
