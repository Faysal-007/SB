<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogcategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogcategoryController extends Controller
{
    public function list_blog_category(){
        $data = BlogcategoryModel::all()
            ->where('is_delete','=','0');
        return view('admin.blog_category.list',compact('data'));
    }
    public function add_blog_category(){
        return view('admin.blog_category.add');
    }
    public function insert_blog_category(Request $request){
        $user = new BlogcategoryModel;
        $user->name = trim($request->name);
        $user->slug = trim(str::slug($request->name));
        $user->meta_title = trim($request->meta_title);
        $user->meta_description = trim($request->meta_description);
        $user->meta_keyword = trim($request->meta_keyword);
        $user->status = trim($request->status);
        $user->created_by = Auth::user()->id;
        $user->save();
        return redirect('admin/blog_category/list')->with('message','Added Successfully!');
    }
    public function delete_blog_category($id){
        $data = BlogcategoryModel::find($id);
        $data->is_delete=(1);
        $data->update();
        return redirect('admin/blog_category/list')->with('message','Deleted Successfully!');

    }
}
