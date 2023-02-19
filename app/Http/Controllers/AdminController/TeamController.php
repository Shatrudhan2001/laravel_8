<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
class TeamController extends Controller
{
     public function index($id = null){
        if($id != null){
            $title = "Edit Team";
            $data = Team::find($id);
            return view('admin.TeamForm',compact('title','data'));
        }
        else{
            $title = "Team List";
            $team_list = Team::all();
            return view('admin.teamlist',compact('title','team_list'));
        }
    }

    public function AddTeam(Request $req){
        if($req->input() != null){
            $req->validate([
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'name' => 'required',
            'phone' => 'required|min:10|max:13',
            'designation' => 'required'
            ]);
            $data = new Team();
            $data->name = $req->input('name');
            $data->phone = $req->input('phone');
            $data->designation = $req->input('designation');
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/teams',$filename);
                $data->image = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                $data = Team::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $data->image = $filename;
                }
                $data->name = $req->input('name');
                $data->phone = $req->input('phone');
                $data->designation = $req->input('designation');
                $data->update();
                $msg  = 'Team Updated Successfully!'; 
                return redirect('teamlist')->with('status', $msg);    
            }
            else{
                $data->save();
                $msg  = 'Team Added Successfully!';
                return redirect('teamlist')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add Team';
            return view('admin.TeamForm',compact('title'));
        }
    }

    public function DeleteTeam($id){
        $data = Team::find($id);
        unlink("uploads/teams/".$data->image);
        $data->delete();
        return redirect()->back()->with('status','Team Deleted Successfully');
    }
}