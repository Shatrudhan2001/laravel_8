<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::where('slug','about')->first(); 
        return view('web.about_us',compact('data'));
    }
    
    public function chairmanMessage()
    {   
        $data = About::where('slug','chairmanMessage')->first(); 
        return view('web.chairman-message',compact('data'));
    }
    public function visionMission()
    {
        $data = About::where('slug','visionMission')->first(); 
        return view('web.vision-mission',compact('data'));
    }
     
}