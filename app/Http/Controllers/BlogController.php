<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\BlogcategoryModel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function list_blog(){
        $data = BlogModel::all();
        return view('admin.blog.list',compact('data'));
    }
    public function add_blog(){
        $data= BlogcategoryModel::all();
        return view('admin.blog.add',compact('data'));
    }
    public function insert_blog(Request $request){
        $user = new BlogModel;
        $user->title = trim($request->title);
        $user->slug = trim($request->title);
        $user->category = trim($request->category);
        $user->subtitle = trim($request->subtitle);
        $user->image_title = trim($request->image_title);
        $user->description = trim($request->description);
        

        $image= $request->thumbnail;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->thumbnail->move('thumbnail',$imagename);
        $user->thumbnail=$imagename;

        $image2= $request->content_image;
        $imagename2=time().'.'.$image2->getClientOriginalExtension();
        $request->content_image->move('content_image',$imagename2);
        $user->content_image=$imagename2;
        $user->created_by = Auth::user()->id;
        $user->save();
        return redirect('admin/blog/list')->with('message','Added Successfully!');
       }
}
