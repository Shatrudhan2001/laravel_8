<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblNew;

class NewsController extends Controller
{
    public function index()
    {
        $news_list = TblNew::all();
        return view('web.news', compact('news_list'));
    }

    public function newDetails($id = null)
    {
        $news_details = TblNew::find($id);
        $news_list = TblNew::all();
        return view('web.news-details',compact('news_details','news_list'));
    }
}