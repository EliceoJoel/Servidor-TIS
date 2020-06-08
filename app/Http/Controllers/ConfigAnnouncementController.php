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
   
    public function  finishConfigurationMerit(Request $request){
       
        $announcement = $request->id_announcement;
        $configAnnouncement = ConfigAnnouncement::where('id_announcement', '=', $announcement)->where('type', '=', 'merit')->update(['configuration' => 'true']);
        return $configAnnouncement;
    }
    public function  finishConfigurationKnowledge(Request $request){
       
        $announcement = $request->id_announcement;
        $configAnnouncement = ConfigAnnouncement::where('id_announcement', '=', $announcement)->where('type', '=', 'knowledge')->update(['configuration' => 'true']);;
        return $configAnnouncement;
    }   
    public function  meritConfigurated(Request $request){
       
        $announcement = $request->id_announcement;
        $configurated =ConfigAnnouncement::select('configuration')->where('id_announcement', '=', $announcement)->where('type', '=', 'merit')
        ->get();
        if($configurated[0]->configuration == true){
            $meritConfigurate = 'true';
        }else {
            $meritConfigurate = 'false';
        }
        return $meritConfigurate;
    }   
    public function  meritFalseConfigurated(Request $request){
       
        $announcement = $request->id_announcement;
        $configurated =ConfigAnnouncement::where('id_announcement', '=', $announcement)->where('type', '=', 'merit')
                                            ->update(['configuration' => 'false']);
      
        return $configurated;
    }   
    public function  knowledgeConfigurated(Request $request){
       
        $announcement = $request->id_announcement;
        $configurated =ConfigAnnouncement::select('configuration')->where('id_announcement', '=', $announcement)->where('type', '=', 'knowledge')
        ->get();
        if($configurated[0]->configuration == true){
            $meritConfigurate = 'true';
        }else {
            $meritConfigurate = 'false';
        }
        return $meritConfigurate;
    }   
    public function  knowledgeFalseConfigurated(Request $request){
       
        $announcement = $request->id_announcement;
        $configurated =ConfigAnnouncement::where('id_announcement', '=', $announcement)->where('type', '=', 'knowledge')
                                            ->update(['configuration' => 'false']);
      
        return $configurated;
    }   
   
    
}
