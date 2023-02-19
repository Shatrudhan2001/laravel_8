<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;


class FaqsSection extends Controller
{
    public function index($id = null){
        if($id != null){
            $title = "Edit Faqs";
            $data = Faq::find($id);
            return view('admin.FaqsForm',compact('title','data'));
        }
        else{
            $title = "Faqs List";
            $faqs_list = Faq::all();
            return view('admin.faqslist',compact('title','faqs_list'));
        }
    }

    public function AddFaqs(Request $req){
        if($req->input() != null){
            $req->validate([
            'question' => 'required',
            'answer' => 'required'
            ]);
            $faq = new Faq();
            $faq->question = $req->input('question');
            $faq->answer = $req->input('answer');
           
            $msg = '';
            if($req->input('id') != null){
                $faq = Faq::find($req->input('id'));
                $faq->question = $req->input('question');
                $faq->answer = $req->input('answer');
                $faq->update();
                $msg  = 'Faqs Updated Successfully!'; 
                return redirect('faqslist')->with('status', $msg);    
            }
            else{
                $faq->save();
                $msg  = 'Faqs Added Successfully!';
                return redirect('faqslist')->with('status', $msg);
                dd();
            }
            return redirect()->back()->with('status', $msg);
        }
        else{
            $title = 'Add Faqs';
            return view('admin.FaqsForm',compact('title'));
        }
    }

    public function DeleteFaqs($id){
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->back()->with('status','Faqs Deleted Successfully');
    }

   
}