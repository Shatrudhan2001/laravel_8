<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index($id = null){
        if($id != null){
            $data = Banner::find($id); // Fetch Single record
            return view('admin.banner', compact('data'));
        }
        else{
            $banner_list = Banner::all(); // Fetch all records
            return view('admin.banner', compact('banner_list'));
        }
        
    }

    public function AddBanner(Request $req){
        $req->validate([
            'image'=>'required|image|mimes:jpeg,jpg,png|max:5000'
        ]);
        $banner = new Banner();
        if($req->hasFile('image')){
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/banners',$filename);
            $banner->image = $filename;
        }
        $msg = '';
        if($req->input('id') != null){
            $banner = Banner::find($req->input('id'));
            $banner->image = $filename;
            $banner->update();
            $msg  = 'Banner Updated Successfully!'; 
            return redirect('home-banner')->with('status', $msg);
            dd();     
        }
        else{
            $banner->save();
            $msg  = 'Banner Added Successfully!';
        }
        return redirect()->back()->with('status', $msg);
 
    }

    public function DeleteBanner($id){
        $banner = Banner::find($id);
        unlink("uploads/banners/".$banner->image);
        $banner->delete();
        return redirect()->back()->with('status','Banner Deleted Successfully');
    }
}