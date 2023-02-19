<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscriber;
use App\Models\Event;

class loginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function loginProcess(Request $req)
    {
        
        $req->validate([
        'email'     => 'required',
        'password'  => 'required'    
        ]);
        $credentials = $req->only('email', 'password');
        $data = User::where('email', $req->email)->first();
        
        if (Auth::attempt($credentials)) {
            Session::put('userData',$data);
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
        return redirect('admin-login')->withError('Wrong Credential!');
        

    }

    public function register()
    {
        return view('admin.register');
    }

    public function registerProcess(Request $request)
    {  
        $request->validate([
            'name'=>'required:50|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:12'
        ]);
        $user = new User();
        $user->name             = strip_tags($request->name);
        $user->email            = strip_tags($request->email);
        $user->login_time       = date("Y-m-d h:i:s");
        $user->logout_time      = date("Y-m-d h:i:s");
        $user->password_view    = strip_tags($request->password);
        $user->password         = Hash::make($request->password);
        $res                    = $user->save();
        if($res){
            return back()->with('success','you have registered successfuly');
            // dd('success');
        }
        else{
            return back()->with('fail',"something wrong");
            //dd('wrong');
        }
    }

    public function dashboard()
    {
        if(Auth::check()){
            $title      = "Dashborad";
            $user       = User::select('id')->where(array('roll'=> '0', 'status'=> '1'))->get('users')->count();
            $team       = Team::select('id')->get('teams')->count();
            $subscriber = Subscriber::select('id')->get('subscribers')->count();
            $events     = Event::select('id')->get('events')->count();
            return view('admin.dashboard',compact('title','user','team','subscriber','events'));
        }
        return redirect("admin-login")->withSuccess('Access not allowed!');
    }

    public function ViewAdminProfile(){
        $title = "Edit Profile";
        return view('admin.profile',compact('title'));
    }

    public function UpdateAdminProfile(Request $req){
        $req->validate([
           'newpass'=>'required|min:8|max:12',
           'cpass'=>'required|min:8|max:12'
        ]);
        $id                     = session::get('userData')['id'];
        $user                   = User:: find($id);
        $user->password_view    = $req->cpass;
        $user->password         = Hash::make($req->cpass);
        $user->update();
        return redirect()->back()->with('status','Updated Successfully');
        
    }

    public function logOut() {
        Session::flush();
        Auth::logout();
        return redirect('admin-login');
    }

    public function subscriberlist(){
        $title  = "Subscriber     List";
        $data   = Subscriber::all();
        return view('admin.subscriberlist',compact('title','data'));
    }

    public function DeleteSubscriber($id){
        $data = Subscriber::find($id);
        $data->delete();
        return redirect()->back()->with('status','Subscriber Deleted Successfully');
    }
}