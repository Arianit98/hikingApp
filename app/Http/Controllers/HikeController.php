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
            'appid'=>'9d53e3e29e217be89757b264c15c09c0'
            ]);

        $weather = json_decode($response1,true);

        $id=$weather['id'];

        //$forecast=json_decode($response1,true);
        
        /*$weather=$forecast['weather'];
        //$description=$weather[];
        $temp=$forecast['main']['temp'];
        
        
        /*foreach ($forecast['weather'] as $weather) {
            $main=$weather->main;
        }
        foreach ($forecast->main as $main1) {
            $temp=$main1->temp;
        }*/

        //return $forecast['weather']; 
          

        return view('client.destination-item',['trail'=>$trail, 'id'=>$id]);
    }

    
}
