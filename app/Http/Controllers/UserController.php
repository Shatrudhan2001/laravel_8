<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Member;
use App\Models\Donar;
use DB;
class UserController extends Controller
{
    public function index(){
       return view('web.member.login');           
    }

    public function MemberLoginProcess(Request $req){
       if($req->input() != null){
            $req->validate([
            'email'     => 'required|max:255',
            'password'  => 'required'    
            ]);
            //$credentials = array('email'=>$req->input('email'), 'password' => Hash::make($req->input('password')));
            //$query = "select name, email FROM members WHERE email = '".$req->input('email')."' AND password_view = '".$req->input('password')."'";
            $res = Member::where(["email" => $req->input('email'), 'password_view' => $req->input('password')])->first();
            $sessionData = [
                'id'=>$res->id,
                'name' => $res->name,
                'email' => $res->email,
                'mobile' => $res->mobile
                ];
            // echo '<pre>';
            // print_r($res->name);
            // // echo $res->name;
            // die;
            if (!empty($res)) {
                Session::put('memberData',$sessionData);
                return redirect()->intended('member-dashboard')->withSuccess('Signed in');
                // echo '<pre>';
                // echo 'success';
                // print_r(Session::get('memberData')); die;
            }
            return redirect('login')->with('status', 'Wrong Crendential!');
        }
    }

    public function member(){
        $title = 'Dashborad';
        $data = Member::where('id',Session::get('memberData')['id'])->first();
        return view('web.member.index',compact('title','data'));
    }

    public function EditMember(){
        $title = "Edit Profile";
        $data = Member::where('id',Session::get('memberData')['id'])->first();
        return view('web.member.edit-profile',compact('title','data'));
    }

    public function UpdateMember(Request $req){
        if ($req->input() != null){
            $req->validate([
                'name'      => 'required|max:50|',
                'email'     => 'required|max:50|email',
                'mobile'    => 'required|numeric|digits:10',
                'address'   => 'required|string',
                'image'     =>'image|mimes:jpeg,jpg,png|max:5000',  
            ]);
            $data = User::find(Session::get('memberData')['id']);
            $data->name     = $req->input('name');
            $data->email    = $req->input('email');
            $data->phone    = $req->input('mobile');
            $data->address  = $req->input('address');
            
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/users',$filename);
                $data->image = $filename;
            }

            $data->update();
            return redirect('edit-member')->with('status', 'Profile Updated Successfuly!');
        }
    }

    public function ChangePassword(Request $req){
        if($req->input() != null && !empty(Session::get('memberData'))){
            $msg = '';
            
            $id = Session::get('memberData')['id'];
            $email = Session::get('memberData')['email'];
            $password = 'Bsrs@'.rand(1000,9999).'#';
            $data = array();
            $data['password']         = Hash::make($password);
            $data['password_view']    = $password;
            $data['updated_at']       = date("Y-m-d h:i:s");
            
            DB::table('members')->where('id',$id)->update($data);
            /* get username and password */
            $to = trim($email);
            $subject = "Password | BSRS!";
             
            $message = "<h4>Email Id : ".$to. "</h4>";
            $message .= "<h4>Password : " .$password. "</h4>";
            $header = "From:info@bsrs.in \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
             
            $retval = mail ($to,$subject,$message,$header);
            if( $retval == true ) {
                $msg  = 'Password Reset Successfully! Check your email id for password
            ';
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Send Request For Change Password';
            return view('web.member.change-password',compact('title'));
        }
    }

    public function MemberLogout() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    // public function register(Request $req){
        
    // }
    
    public function donarList(){
        $title = 'Donar List';
        $data = Donar::orderBy('id','desc')->get();    
        return view('admin.donar-list',compact('title','data'));           
    }
    
    public function DeleteDonar($id){
        if(!empty($id)){
            $data = Donar::find($id);  
            $data->delete();
            return redirect()->back()->with('status','Record Deleted Successfully');
        }
    }
}