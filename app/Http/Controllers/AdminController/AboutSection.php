<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
class AboutSection extends Controller
{
    //
    public function index($id = null){
        if($id != null){
            $title = 'Update About Section';
            $data = About::find($id);
            return view('admin.AddUpdateAbout',compact('data','title'));
        }
        else{
             $title = "About Section";
            $about_list = About::all();
            return view('admin.aboutlist',compact('about_list', 'title'));
        }
        
    }

    public function AddUpdateAbout(Request $req){
        if($req->input() == null){
            $title = 'Add About Section';
            return view('admin.AddUpdateAbout',compact('title'));
        }
        else{
            $req->validate([
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'title' => 'required',
            'description' => 'required'
            ]);
            
            $about = new About();
            $about->title = $req->input('title');
            $about->description = $req->input('description');
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/abouts',$filename);
                $about->image = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                $about = About::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $about->image = $filename;
                }
                $about->title = $req->input('title');
                $about->description = $req->input('description');
                $about->update();
                $msg  = 'Recored Updated!'; 
                return redirect('about-section')->with('status', $msg);    
            }
            else{
                $about->save();
                $msg  = 'Record Added Successfully!';
                return redirect('about-section')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
    }

    public function DeleteAbout($id){
        $about = About::find($id);
        unlink("uploads/abouts/".$about->image);
        $about->delete();
        return redirect()->back()->with('status','Record Deleted Successfully');
    }

}