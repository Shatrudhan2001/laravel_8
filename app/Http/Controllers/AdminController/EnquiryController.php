<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index(){
        $title = 'Enquiry List';
        $data = Enquiry::orderBy('id','desc')->get();
        return view('admin.enquirylist',compact('title','data'));
    }

    public function DeleteRecored($id){
        $data = Enquiry::find($id);
        $data->delete();
        return redirect()->back()->with('status','Record Deleted Successfully');
    }
}