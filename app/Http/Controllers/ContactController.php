<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact us';
        return view('web.contact', compact('title'));
    }

    public function SaveEnquiry(Request $req){
        if($req->input() != null){
            $req->validate([
                'name'      => 'required|max:50|',
                'email'     => 'required|max:50|email',
                'mobile'    => 'required|numeric|digits:10',
                'address'   => 'string',
                'message'   =>'max:500',  
            ]);
            
            $data = new Enquiry;
            $data->name     = strip_tags($req->input('name'));
            $data->email    = strip_tags($req->input('email'));
            $data->phone    = strip_tags($req->input('mobile'));
            $data->address  = strip_tags($req->input('address'));
            $data->message  = strip_tags($req->input('message'));
            $data->save();
            return redirect('contact')->with('status', 'Your Request has been submitted Successfuly!');
               
            
        }
        
        
    }
}