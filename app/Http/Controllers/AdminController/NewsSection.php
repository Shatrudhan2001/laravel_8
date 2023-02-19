<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TblNew;


class NewsSection extends Controller
{
    public function index($id = null){
        if($id != null){
            $title = "Edit News";
            $data = TblNew::find($id);
            return view('admin.NewsForm',compact('title','data'));
        }
        else{
            $title = "News List";
            $news_list = TblNew::all();
            return view('admin.newslist',compact('title','news_list'));
        }
    }

    public function AddNews(Request $req){
        if($req->input() != null){
            $req->validate([
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'title' => 'required',
            'description' => 'required'
            ]);
            $event = new TblNew();
            $event->title = $req->input('title');
            $event->description = $req->input('description');
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/news',$filename);
                $event->image = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                $event = TblNew::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $event->image = $filename;
                }
                $event->title = $req->input('title');
                $event->description = $req->input('description');
                $event->update();
                $msg  = 'News Updated Successfully!'; 
                return redirect('newslist')->with('status', $msg);    
            }
            else{
                $event->save();
                $msg  = 'News Added Successfully!';
                return redirect('newslist')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add News';
            return view('admin.NewsForm',compact('title'));
        }
    }

    public function DeleteNews($id){
        $event = TblNew::find($id);
        unlink("uploads/news/".$event->image);
        $event->delete();
        return redirect()->back()->with('status','News Deleted Successfully');
    }

   
}