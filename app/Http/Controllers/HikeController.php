<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Attribute;
use Illuminate\Support\Facades\DB;

class HikeController extends Controller
{
    public function index()
    {   
        $users = DB::select('select name from users where id = :id', ['id' => 1]);
        return view('client.index');
    }

    public function about()
    {
        return view('client.about');
    }

    public function contact()
    {
        return view('client.contact');
    }


    public function destination(Request $request)
    {
        $hikingDestination = $request['hikingDestination'];
        $searchCity=DB::select('select * from requestsByCity where city = :city', ['city' => $hikingDestination]);
               

        if ($searchCity != null) {

            $searchedAt=DB::select('select created from requestsByCity where city = :city', ['city' => $hikingDestination]);
            $currentTime=date("Y-m-d h:i:s");
            $diff = abs(strtotime($searchedAt[0]->created) - strtotime($currentTime));
            $years   = floor($diff / (365*60*60*24)); 
            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
            $minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

            if ($hours<24) {
                $result=DB::select('select apiResponse from requestsByCity where city = :city', ['city' => $hikingDestination]);
                $response=$result[0]->apiResponse;
            }
            else {

                $response = Http::get('https://prescriptiontrails.org/api/filter/',[
                    'by'=>'city',
                    'city'=>$hikingDestination,
                    'offset'=>0,
                    'count'=>10
                    ]);
                
                DB::update('update requestsByCity set apiResponse=?,created=? where city=?', [$response,$currentTime,$hikingDestination]);
            }
            
        }

        else {
            $response = Http::get('https://prescriptiontrails.org/api/filter/',[
                'by'=>'city',
                'city'=>$hikingDestination,
                'offset'=>0,
                'count'=>10
                ]);
            
            DB::insert('insert into requestsByCity (city, created, apiResponse) values (?,?,?)',[$hikingDestination, date("Y-m-d h:i:s"), $response]);
        }

        $hikingPlaces=json_decode($response);
        
        return view('client.destination', ['hikingDestination'=>$hikingDestination,'hikingPlaces'=>$hikingPlaces]);
    }

    public function destination_item($id)
    {
        $searchTrail=DB::select('select * from requestsbytrailid where id = ?', [$id]);

        if ($searchTrail != null) {

            $searchedAt=DB::select('select created from requestsbytrailid where id = ?', [ $id]);
            $currentTime=date("Y-m-d h:i:s");
            $diff = abs(strtotime($searchedAt[0]->created) - strtotime($currentTime));
            $years   = floor($diff / (365*60*60*24)); 
            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
            $minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

            if ($hours<24) {
                $result=DB::select('select apiResponse from requestsbytrailid where  id = ?', [$id]);
                $response=$result[0]->apiResponse;
            }
            else {

                $response = Http::get('https://prescriptiontrails.org/api/trail/',[
                    'id'=>$id
                    ]);
                
                DB::update('update requestsbytrailid set apiResponse=?,created=? where id=?', [$response,$currentTime,$id]);
            }
            
        }

        else {
            $response = Http::get('https://prescriptiontrails.org/api/trail/',[
                'id'=>$id
                ]);
            DB::insert('insert into requestsbytrailid (id, created, apiResponse) values (?,?,?)',[$id, date("Y-m-d h:i:s"), $response]);
        }

        
        $trail=json_decode($response);

    
        $city=$trail->city;
        $difficulity=$trail->difficulty;

        $searchWeatherCity=DB::select('select * from weatherRequests where city = :city', ['city' => $city]);
               

        if ($searchWeatherCity != null) {

            $searchedAt=DB::select('select created from weatherRequests where city = :city', ['city' => $city]);
            $currentTime=date("Y-m-d h:i:s");
            $diff = abs(strtotime($searchedAt[0]->created) - strtotime($currentTime));
            $years   = floor($diff / (365*60*60*24)); 
            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
            $minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

            if ($minutes<10) {
                $result=DB::select('select apiResponse from weatherRequests where city = :city', ['city' => $city]);
                $response1=$result[0]->apiResponse;
            }
            else {

                $response1 = Http::get('api.openweathermap.org/data/2.5/weather',[
                    'q'=>$city,
                    'units'=>'metric',
                    'appid'=>'9d53e3e29e217be89757b264c15c09c0'
                    ]);
                
                DB::update('update weatherRequests set apiResponse=?,created=? where city=?', [$response1,$currentTime,$city]);
            }
            
        }

        else {
            $response1 = Http::get('api.openweathermap.org/data/2.5/weather',[
                'q'=>$city,
                'units'=>'metric',
                'appid'=>'9d53e3e29e217be89757b264c15c09c0'
                ]);
            
            
            DB::insert('insert into weatherRequests (city, created, apiResponse) values (?,?,?)',[$city, date("Y-m-d h:i:s"), $response1]);
        }

        $weather = json_decode($response1);

        $id=$weather->id;
        $weathertag=$weather->weather;
        $maintag=$weather->main;
            
        $main= $weathertag[0]->main;
        $temp=$maintag->temp;

        $overallSuggestion=null;
        $clotheSuggestion1=null;
        $clotheSuggestion3=null;
        $clotheSuggestion2=null;

        switch ($main) {
            case (str_contains($main,'Cloud') || str_contains($main,'Clear') || str_contains($main,'Sunn')) && $temp>25:
                $overallSuggestion='Suggested';
                $clotheSuggestion1='Wear as light as possible';
                $clotheSuggestion3='Carry a hydration pack';
                $clotheSuggestion2='Avoid taking jackets or clothes with many layers';
                break;

            case (str_contains($main,'Cloud') || str_contains($main,'Clear') || str_contains($main,'Sunn')) && $temp<25:
                $overallSuggestion='Suggested';
                $clotheSuggestion1='Wear loose, breathable clothing';
                $clotheSuggestion3='Use synthethic shirts';
                $clotheSuggestion2='It might get chilly at the top';
                break;

            case str_contains($main,'Rain'):
                $overallSuggestion='Not Suggested';
                $clotheSuggestion1='Make sure to take a raincoat and umbrella';
                $clotheSuggestion3='Use Backpack with rain cover';
                $clotheSuggestion2='Avoid wearing light clothes';
                break; 

            case str_contains($main,'Snow'):
                $overallSuggestion='Not Suggested';
                $clotheSuggestion1='Make sure to wear multiple layers';
                $clotheSuggestion3='Use insulated hiking boots';
                $clotheSuggestion2='Avoid wearing less layers';
                break; 
            
            default:
                $overallSuggestion='No information';
                $clotheSuggestion1='No information';
                $clotheSuggestion2='No information';
                break;
        }

        $difficulitySuggestion=null;

        switch ($difficulity) {
            case '1':
                $difficulitySuggestion='Low difficulity hike. Suggested for beginners';
                break;

            case '2' && '3':
                $difficulitySuggestion='Medium difficulity hike. Suggested for experienced individuals';
                break;

            case '4' && '5':
                $difficulitySuggestion='High difficulity hike. Suggested for experts';
                break;
            
            default:
                $difficulitySuggestion='No information';
                break;
        }

        
  
        return view('client.destination-item',['trail'=>$trail, 'id'=>$id, 'overallSuggestion'=>$overallSuggestion, 'clotheSuggestion1'=>$clotheSuggestion1, 'clotheSuggestion2'=>$clotheSuggestion2, 'clotheSuggestion3'=>$clotheSuggestion3, 'difficulitySuggestion'=>$difficulitySuggestion ]);
    }

    
}
