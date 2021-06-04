<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherAPI extends Controller
{
    public function fetch()
    {
        //http://www.outdooractive.com/api/project/api-dev-oa/region/tree?keyourtest-outdoora-ctiveapi
        
        $response = Http::get('https://trailapi-trailapi.p.rapidapi.com/trails/map/%7Bid%7D/gpx/');
        
        $pergjigja = json_decode($response->body());
        $p=dd($pergjigja);
        //dd($pergjigja);
       
        for ($i=0; $i <6 ; $i++) { 
          $p[$i]->emri;
        }


       /*foreach($pergjigja as $p){
         if ($p->userId==1) {
             echo $p->title . '</br>';
         }
       }*/
       

    }
}
