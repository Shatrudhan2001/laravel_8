<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamSection extends Controller
{
    //
    public function index()
    { 
        $title = 'Our Team';
        $data = Team::all();
        return view('web/team',compact('title','data'));
    }
}