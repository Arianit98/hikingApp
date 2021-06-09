<?php

use App\Http\Controllers\API\WeatherAPI;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OutdoorActivitiesAPI;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index1', function () {
    return view('client.index1');
});

//Route::get('/fetch', [WeatherAPI::class, 'fetch']);
//Route::get('/outdoor', [OutdoorActivitiesAPI::class, 'outdoorActivities']);

Route::get('/index', [HikeController::class, 'index'])->name('Hike.index');
Route::get('/about', [HikeController::class, 'about'])->name('Hike.about');
Route::get('/contact', [HikeController::class, 'contact'])->name('Hike.contact');
Route::get('/destination', [HikeController::class, 'destination'])->name('Hike.destination');
Route::get('/destination-item/{id}', [HikeController::class, 'destination_item'])->name('Hike.destination-item');








