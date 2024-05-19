<?php

namespace App\Http\Controllers;
use App\Models\BlogModel;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function public_index(){
        return view('user.home.user_index');
    }
    public function public_home(){
        return view('user.home.user_index');
    }
    public function public_dashboard(){
        return view('user.home.user_index');
    }
    public function blog(){
        $blog = BlogModel::all();
        return view('user.home.blog',compact('blog'));
    }
    public function blog_post($slug){
        $blog_post = BlogModel::where('slug', $slug)->first();
        return view('user.home.blog_post',compact('blog_post'));
    }
}
