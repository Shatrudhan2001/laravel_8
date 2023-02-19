<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;
use App\Models\Event;
use App\Models\Faq;
use App\Models\TblNew;
use App\Models\User;
use App\Models\tblComplain;
use App\Models\Subscriber;
use App\Models\Member;
use App\Models\Donar;
use \Illuminate\Support\Str;

date_default_timezone_set('Asia/Calcutta');
class IndexController extends Controller
{
    public function index(){
       
        $banner_list = Banner::all();
        $event_list = Event::all();
        $faqs_list = Faq::all();
        $news_list = TblNew::all();
        $about = About::where('slug','about')->first(); 
        return view('web.index', compact('banner_list','about','event_list','faqs_list','news_list'));
    }

    public function SaveEnquiryData(Request $request){
        if($request->input() != null){
            $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'mobile' => 'required|numeric|digits:10'
        ]);
        $data = new tblComplain();
        $data->name = $request->input('fname')." ".$request->input('lname');
        $data->email = $request->input(('email'));
        $data->mobile = $request->input(('mobile'));
        $data->subject = $request->input(('subject'));
        $data->message = $request->input(('message'));
        $data->created_at = date('Y-m-d h:i:s');
        $data->save();
        return redirect('/')->with('status', "Your request has been submitted!");
        }      
    }

    public function SaveSubscriber(Request $request){
        if($request->input() != null){
           $request->validate([
            'email' => 'required|email'
            ]);
            $data = new Subscriber();
            $data->email = strip_tags($request->input(('email')));
            $data->created_at = date('Y-m-d h:i:s');
            $id = $data->save();
            if($id){
                return redirect('/'); 
            }
            else{
                return redirect('/'); 
            }
        }      
    }

    public function complaint(){
        return view("web.complaint");
    }

    public function payOnline(){
        return view("web.pay-online");
    }

    public function donate(Request $request){
        if(isset($_POST) && !empty($_POST)){
            if($request->input() != null){
                $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|max:255',
                    'mobile' => 'required|numeric',
                    'amount' => 'required'
                ]);
            }
            $transactionId = "BSRS".date('Y').rand(1000,9999);
            $data = [
                    'name' => strip_tags($_POST["name"]),
                    'email' => strip_tags($_POST["email"]),
                    'phone' => strip_tags($_POST["mobile"]),
                    'amount' => strip_tags($_POST["amount"]),
                    'city' => strip_tags($_POST["city"]),
                    'state' => strip_tags($_POST["state"]),
                    'country' => 'India',
                    'transactionId' => $transactionId,
                    'status' => 'SUCCESS',
                    'payment_date' => date('Y-m-d H:i:s')
                ];
                Donar::insert($data);
                return redirect('/donate')->with('status', "Your request has been submitted!");
        }
        else{
            $title = 'Donate';
            return view("web.donate",compact('title'));
        }
        
    }
    
    public function defaultMemberList(){
        $title = 'Member list';
        $member_list = Member::where('status','1')->orderBy('id','desc')->get();
        return view('web.member-list',compact('title','member_list'));
    }
        
}