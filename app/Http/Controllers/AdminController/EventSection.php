<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\MultipleImage;

class EventSection extends Controller
{
    public function index($id = null){
        if($id != null){
            $title = "Edit Event";
            $data = Event::find($id);
            return view('admin.EventForm',compact('title','data'));
        }
        else{
            $title = "Event List";
            $event_list = Event::all();
            return view('admin.eventlist',compact('title','event_list'));
        }
    }

    public function AddEvent(Request $req){
        if($req->input() != null){
            $req->validate([
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'title' => 'required',
            'description' => 'required'
            ]);
            $event = new Event();
            $event->title = $req->input('title');
            $event->description = $req->input('description');
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/events',$filename);
                $event->image = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                $event = Event::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $event->image = $filename;
                }
                $event->title = $req->input('title');
                $event->description = $req->input('description');
                $event->update();
                $msg  = 'Events Updated Successfully!'; 
                return redirect('eventlist')->with('status', $msg);    
            }
            else{
                $event->save();
                $msg  = 'Event Added Successfully!';
                return redirect('eventlist')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add Event';
            return view('admin.EventForm',compact('title'));
        }
    }

    public function DeleteEvent($id){
        $event = Event::find($id);
        unlink("uploads/events/".$event->image);
        $event->delete();
        return redirect()->back()->with('status','Event Deleted Successfully');
    }

    public function multipleimagelist($id = null){
         if($id != null){
            $title = "Edit photo";
            $data = MultipleImage::find($id);
            $event_list = Event::all();
            return view('admin.MultipleImageForm',compact('title','data','event_list'));
        }
        else{
            $title = 'Events photo';
            $photo_list = MultipleImage::join('events as e','e.id', '=' ,'multiple_images.globle_id')->get(['multiple_images.*', 'e.title']);
            return view('admin.multipleimagelist',compact('title','photo_list'));       
        }
       
    }

     public function multipleimageform(Request $req){
        if($req->input() != null){
           
            $req->validate([
            // 'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'globle_id' => 'required'
            ]);
            $event = new MultipleImage();
            $msg = '';
            if($req->hasFile('image')){
                if($req->input('id') != null){
                    $event = MultipleImage::find($req->input('id'));
                    if(!empty($req->file('image'))){
                        $file = $req->file('image');
                        $extention = $file->getClientOriginalExtension();
                        $randRom =  rand(10,100);
                        $filename = $randRom.time().'.'.$extention;
                        $file->move('uploads/multipleimages',$filename);
                        $event->image = $filename;
                        $event->globle_id = $req->input('globle_id');
                        $event->update();
                        $msg  = 'Photo Updated Successfully!'; 
                        return redirect('multipleimglist')->with('status', $msg);  
                    }
                }
                else{
                    $file = $req->file('image');
                    $data = array();
                    foreach($file as $r){
                        //$filename = $r->getClientOriginalName();
                        $extention = $r->getClientOriginalExtension();
                        $randRom =  rand(10,100);
                        $Newfilename = $randRom.time().'.'.$extention;
                        $r->move('uploads/multipleimages',$Newfilename);
                        $data['image'] =  $Newfilename;
                        $data['globle_id'] = $req->input('globle_id');
                        $data['created_at'] = date('Y-m-d h:i:s');
                        $event->insert($data);
                    }
                }
               
                $msg  = 'Photos Added Successfully!';
                return redirect('/multipleimglist')->with('status', $msg);
                
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add Photos';
            $event_list = Event::all();
            return view('admin.MultipleImageForm',compact('title', 'event_list'));
        }
    }

     public function DeletePhotos($id){
        $event = MultipleImage::find($id);
        unlink("uploads/multipleimages/".$event->image);
        $event->delete();
        return redirect()->back()->with('status','Photo Deleted Successfully');
    }
}