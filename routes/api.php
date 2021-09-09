<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Event;
use App\Models\Achievement;
use App\Models\Society;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events',function(){
    $events = Event::orderBy('date','desc')->get();
    if(count($events) >= 1)
    {
        return $events;
    }
    return 0;
});

Route::get('events/{event}',function($event){
    $event = Event::find($event);
    return $event;
});

Route::get('/achievements',function(){
    $achievements = Achievement::orderBy('id','desc')->get();
    if(count($achievements) >= 1)
        return $achievements;
    return 0;
});

Route::get('/achievements/{achievement}',function($achievement){
    $achievement = Achievement::find($achievement);
    return $achievement;
});

Route::get('society/events/{society}',function($society){
    $events = Society::find($society)->events;
    if($events->count() >= 1)
        return $events;
    return 0;
});