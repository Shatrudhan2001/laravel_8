<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\MultipleImage;
class EventsController extends Controller
{
    public function index()
    {   
        $event_list = Event::all();
        return view('web.events', compact('event_list'));
    }

    public function eventsDetails($id = null)
    {
        $event_list = Event::find($id);
        $photo_list = MultipleImage::select("image")->where('globle_id',$id)->get();
        return view('web.events-details',compact('event_list','photo_list'));
    }
}