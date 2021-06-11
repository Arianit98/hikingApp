<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Attribute;

class HikeController extends Controller
{
    public function index()
    {
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

        $response = Http::get('https://prescriptiontrails.org/api/filter/',[
            'by'=>'city',
            'city'=>$hikingDestination,
            'offset'=>0,
            'count'=>10
            ]);
        
        
        $hikingPlaces=json_decode($response);
        

        return view('client.destination', ['hikingDestination'=>$hikingDestination,'hikingPlaces'=>$hikingPlaces]);
    }

    public function destination_item($id)
    {
        $response = Http::get('https://prescriptiontrails.org/api/trail/',[
            'id'=>$id
            ]);

        $trail=json_decode($response);

        $city=$trail->city;

          $response1 = Http::get('api.openweathermap.org/data/2.5/weather',[
            'q'=>$city,
            'units'=>'metric',
            'appid'=>'9d53e3e29e217be89757b264c15c09c0'
            ]);

        $weather = json_decode($response1);

        $id=$weather->id;
        $weathertag=$weather->weather;
        $maintag=$weather->main;
            
        $main= $weathertag[0]->main;
        $temp=$maintag->temp;

        $overallSuggestion=null;
        $clotheSuggestion1=null;
        $clotheSuggestion2=null;

        switch ($main) {
            case (str_contains($main,'Cloud') || str_contains($main,'Clear')) && $temp>25:
                $overallSuggestion='Suggested';
                $clotheSuggestion1='Wear as light as possible';
                $clotheSuggestion2='Avoid taking jackets or clothes with many layers';
                break;

            case (str_contains($main,'Cloud') || str_contains($main,'Clear'))  && $temp<25:
                $overallSuggestion='Suggested';
                $clotheSuggestion1='Wear light clothes';
                $clotheSuggestion2='It might get chilly at the top';
                break;

            case str_contains($main,'Rain'):
                $overallSuggestion='Not Suggested';
                $clotheSuggestion1='Make sure to take a raincoat and umbrella';
                $clotheSuggestion2='Avoid wearing light clothes';
                break; 
            
            default:
                $overallSuggestion='No information';
                $clotheSuggestion1='No information';
                $clotheSuggestion2='No information';
                break;
        }

        
  
        return view('client.destination-item',['trail'=>$trail, 'id'=>$id, 'overallSuggestion'=>$overallSuggestion, 'clotheSuggestion1'=>$clotheSuggestion1, 'clotheSuggestion2'=>$clotheSuggestion2 ]);
    }

    
}
