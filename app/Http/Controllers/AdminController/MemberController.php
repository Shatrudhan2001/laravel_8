<?php

namespace App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Payment;
use Hash;
use Session;
use Mail;
use DB;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
use App\Imports\UsersImport;
// use App\Exports\ExportUser;

class MemberController extends Controller
{
    public function index($id = null){
       
        if($id != null){
            $title = 'Edit Member';
            $data = Member::find($id);
            return view('admin.UserForm',compact('data','title')); 
        }
        else{
            $title = 'Member list';
            $data = Member::where('status','1')->orderBy('id', 'DESC')->get();
            return view('admin.userlist',compact('title','data'));
       }
    }
    
    public function AddUser(Request $req){
        if($req->input() != null){
            $req->validate([
            'image'             => 'image|mimes:jpeg,jpg,png|max:5000',
            'name'              => 'required',
            // 'phone'             => 'required|numeric|min:10',
            // 'email'          => 'required',
            // 'designation'    => 'required',
            'pocket_id'         => 'required',
            'block'             => 'required',
            'password'          => 'required|min:8',
            ]);
            $data = new Member();
           
            
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/users',$filename);
                $data->image = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                $data = Member::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $data->image = $filename;
                }
                $data->name             = $req->input('name');
                $data->phone            = $req->input('phone');
                $data->email            = $req->input('email');
                $data->pocket_id        = $req->input('pocket_id');
                $data->block            = $req->input('block');
                $data->ownership        = $req->input('ownership');
                // $data->designation      = $req->input('designation');
                $data->password         = Hash::make($req->password);
                $data->password_view    = $req->input('password');
                $data->address          = $req->input('address');
                $data->updated_at       = date("Y-m-d h:i:s");
                $data->update();
                $msg  = 'Record Updated Successfully!'; 
                return redirect('member-list')->with('status', $msg);    
            }
            else{
                $data->name             = $req->input('name');
                $data->phone            = $req->input('phone');
                $data->email            = $req->input('email');
                $data->pocket_id        = $req->input('pocket_id');
                $data->block            = $req->input('block');
                 $data->ownership       = $req->input('ownership');
                //$data->designation      = $req->input('designation');
                $data->password         = Hash::make($req->password);
                $data->password_view    = $req->input('password');
                $data->address          = $req->input('address');
                $data->created_at       = date("Y-m-d h:i:s");
                $data->save();
                $msg  = 'Member has been created Successfully!';
                return redirect('member-list')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add New Member';
            return view('admin.UserForm',compact('title'));
        }
    }

    public function CheckAlreadyEmail(Request $req){
        if($req->input() != null && $req->input('email') != ''){
            $email = $req->input('email');
            $data = User::where('email',$email)->get()->count();
            echo $data; 
        }
    }

    public function DeleteUser($id){
        $data = Member::find($id);
        $data->status = '0';
        $data->update();
        return redirect()->back()->with('status','Member Deleted Successfully');
    }
    
    public function register(){
        if(!empty(Session::get('memberData'))){
            $id = Session::get('memberData')['id'];
            $title = 'Edit Details';
            $data = Member::find($id);
            return view('web.member.register',compact('data','title')); 
        }
        else{
            $title = "Member Registrastion";
            //Session::flush();
            //$data = User::where(array('roll'=> '0', 'status'=> '1'))->orderBy('id', 'DESC')->get();
            return view('web.member.register',compact('title'));
        }
        
    }
    
    public function EmailIdAlreadyExist(Request $req){
        if($req->input() != null && $req->input('email') != ''){
            $email = $req->input('email');
            $data = Member::where('email',$email)->get()->count();
            echo $data; 
        }
    }
    
    public function createMember(Request $req){
        if(isset($_POST) && !empty($_POST)){
            $req->validate([
            'image'=>'image|mimes:jpeg,jpg,png|max:5000',
            'name' => 'required',
            'pocket_id' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required',
            'block' => 'required',
            'address' => 'required',
            'ownership' => 'required'
            ]);
            //$data = new User();
           
            $data = [
               'name'           => strip_tags($req->input('name')),
               'phone'          => $req->input('mobile'),
               'email'          => strip_tags($req->input('email')),
               'pocket_id'      => strip_tags($req->input('pocket_id')),
               'block'          => strip_tags($req->input('block')),
               'address'        => strip_tags($req->input('address')),
               'ownership'      => strip_tags($req->input('ownership')),
               'owner_name'     => strip_tags($req->input('owner_name')),
               'owner_phone'    => strip_tags($req->input('owner_phone')),
               'vahical_1'      => strip_tags($req->input('vahical_1')),
               'vahical_1_no'   => strip_tags($req->input('vahical_1_no')),
               'rfid_1'         => strip_tags($req->input('rfid_1')),
               'vahical_2'      => strip_tags($req->input('vahical_2')),
               'vahical_2_no'   => strip_tags($req->input('vahical_2_no')),
               'rfid_2'         => strip_tags($req->input('rfid_2')),
               'vahical_3'      => strip_tags($req->input('vahical_3')),
               'vahical_3_no'   => strip_tags($req->input('vahical_3_no')),
               'rfid_3'         => strip_tags($req->input('rfid_3'))
               ];
               
            $password = 'Bsrs@'.rand(1000,9999).'#';
            if($req->hasFile('image')){
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/users',$filename);
                $data['image'] = $filename;
            }
            $msg = '';
            if($req->input('id') != null){
                //$data = Member::find($req->input('id'));
                if(!empty($req->file('image'))){
                    $data['image'] = $filename;
                }
                // $data['password']         = Hash::make($password);
                // $data['password_view']    = $password;
                $data['updated_at']   = date("Y-m-d h:i:s");
                // echo '<pre>';
                // print_r($data);dd();
                DB::table('members')->where('id',$req->input('id'))->update($data);
                $msg  = 'Record Updated Successfully!'; 
                return redirect()->back()->with('status', $msg);   
            }
            else{
                $data['password']         = Hash::make($password);
                $data['password_view']    = $password;
                $data['created_at']       = date("Y-m-d h:i:s");
                Member::insert($data);
                /* get username and password */
                $to = trim($_POST['email']);
                $subject = "Password | BSRS!";
                 
                $message = "<h4>Email Id : ".$to. "</h4>";
                $message .= "<h4>Password : " .$password. "</h4>";
                $header = "From:info@bsrs.in \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
                 
                $retval = mail ($to,$subject,$message,$header);
                 
                if( $retval == true ) {
                    $msg  = 'Registration Successfully! Check your email id for password
                ';
                }
                
                /* End */
                return redirect()->back()->with('status', $msg);
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add New Member';
            return view('admin.UserForm',compact('title'));
        }
    }
    
    public function getPasswordEmail() {
        $to = "shatrudhankumar457@gmail.com";
        $subject = "This is subject";
         
        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";
         
        $header = "From:abc@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
         
        $retval = mail ($to,$subject,$message,$header);
         
        if( $retval == true ) {
            echo "Message sent successfully...";
        }else {
            echo "Message could not be sent...";
        }
   }
   
   public function PaymentHistory($id = null){
       $title = 'Payment History';
       if($id != null){
            $member_id = $id; 
            $memberData = Member::where('id',$member_id)->first();
            $data = Payment::where('member_id',$member_id)->orderBy('id', 'DESC')->get();
            return view('admin.payment-history',compact('title','data','member_id','memberData'));
       }
       else{
            $data = Payment::where('member_id',Session::get('memberData')['id'])->orderBy('id', 'DESC')->get();
            return view('web.member.payment-history',compact('title','data'));   
       }
   }
   
   public function ToPayment($member_id = null){
       $title = 'To Payment';
       if($member_id != null){
            return view('admin.Topayment',compact('title', 'member_id'));
       }
   }
   
    public function ToPaymentProcess(Request $req){
       if(isset($_POST) && !empty($_POST['member_id'])){
          $req->validate([
            'opening_balance' => 'required|numeric',
            'closing_balance' => 'required|numeric',
            'amount'          => 'required|numeric',
            'payment_method'  => 'required',
            'payment_date'    => 'required',
            'subscription'    => 'required|numeric'
            ]);
            
            $data = [
                'member_id'         => $_POST['member_id'],
                'opening_balance'   => $_POST['opening_balance'],
                'closing_balance'   => $_POST['closing_balance'],
                'payment_mode'      => $_POST['payment_method'],
                'amount'            => $_POST['amount'],
                'subscriptions'     => $_POST['subscription'],
                'payment_date'      => $_POST['payment_date'],
                'created_on'        => date('Y-m-d H:i:s'),
            ];  
            
            Payment::insert($data);
            echo $msg = 'Payment Successfully!';
            return redirect(url('payment-history/'.$_POST['member_id']))->with('status', $msg);
        }
    }

    public function UploadCsv(Request $req){
       $req->validate(['file' => 'required|mimes:xls,xlsx']);
       Excel::import(new UsersImport, $req->file);
       return back()->with('success', 'Data Imported successfully.');
    }
   
   
}