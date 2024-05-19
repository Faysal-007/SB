<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Hash;
use App\Models\user_profile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard(){
        $User_count= user::where('is_delete','=','0')->count();
        $class_count= ClassModel::count();
        $blog_count= BlogModel::count();
        return view('admin.admin.dashboard',compact('User_count','class_count','blog_count'));
    }

    public function user_profile(){
        $data=user::with('profile_info')
        ->where('id','=',Auth::user()->id)->first();
        return view('admin.admin.user_profile',compact('data'));
    }
    public function update_user_profile(Request $request){
        
        $user = user::findorfail(Auth::user()->id);
        $user->update([
            'name'=>$request->name,
            'phone'=>$request->phone
        ]);


        if($request->hasFile('avatar')){
            $user->profile_info()->updateOrCreate(
                [
                'user_id'=>$user->id
                ],
                [
                'education'=>$request->education,
                'location'=>$request->location,
                'education'=>$request->education,
                'skills'=>$request->skills,
                'position'=>$request->position,
                'bio'=>$request->bio,
                
                $image=$request->avatar,
                $imagename=time().'.'.$image->getClientOriginalExtension(),
                $request->avatar->move('avatar',$imagename),
                'avatar'=>$imagename
            ]);  
        }
        $user->profile_info()->updateOrCreate(
            [
            'user_id'=>$user->id
            ],
            [
            'education'=>$request->education,
            'location'=>$request->location,
            'education'=>$request->education,
            'skills'=>$request->skills,
            'position'=>$request->position,
            'bio'=>$request->bio,
        ]);  


        return redirect('admin/admin/user_profile')->with('message','Added Successfully!');
    }


   



    public function all_user_list(Request $request){
        $query = user::select()->where('is_delete','=','0');
        $data = $query->select('users.*');

        if(!empty($request->name)){
            $data = $data
            ->where('name','LIKE','%'.$request->name.'%')
            ->get();
        }
        
        else{
            $data = $data->get();
        }
        
        return view('admin.admin.list',compact('data'));
    }
    public function add(){
        return view('admin.admin.add_user');
    }
    public function insert(Request $request){
        $request->validate([
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'name'=>'required|unique:users'
        ]);
        $user = new user;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/admin/list')->with('message','Added Successfully!');
    }
    public function edit($id){
        $data=user::find($id);
        return view('admin.admin.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $user = user::find($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        if($request->password){
            $user->password = Hash::make($request->phone);
        }
        $user->save();
        return redirect('admin/admin/list')->with('message','Added Successfully!');
    }
    public function delete($id){
        $user = user::find($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('message','Deleted Successfully!');
    }
}
