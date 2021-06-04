<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OutdoorActivitiesAPI extends Controller
{
    public function outdoorActivities()
    {
        return view('outdoorActivitiesIndex');
    }
}
