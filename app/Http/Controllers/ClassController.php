<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;


class ClassController extends Controller
{
   public function add_class(){
    return view('admin.class.add');
   }

   public function insert_class(Request $request){
    $user = new classModel;
    $user->name = trim($request->name);
    $user->status = trim($request->status);
    $user->created_by = Auth::user()->id;
    $user->save();
    return redirect('admin/class/list')->with('message','Added Successfully!');
   }

   public function list_class(Request $request){
      $data = ClassModel::select('class_models.*','users.name as created_by')
      ->join('users','users.id','class_models.created_by')
      ->where('class_models.is_delete','=','0');

      if(!empty($request->name)){
         $data = $data->where('class_models.name','LIKE','%'.$request->name.'%')->get();
      }
      else{  
         $data= $data->get();
      }
      return view('admin.class.list',compact('data'));
   }
   public function edit_class($id){
      $data = classModel::find($id);
      return view('admin.class.edit',compact('data'));
   }
   public function update_class(Request $request,$id){
      $user = classModel::find($id);
      $user->name = trim($request->name);
      $user->status = trim($request->status);
      $user->created_by = Auth::user()->id;
      $user->update();
      return redirect('admin/class/list')->with('message','Updated Successfully!');
   }
   public function delete_class($id){
      $user = classModel::find($id);
      $user->is_delete=(1);
      $user->update();
      return redirect('admin/class/list')->with('message','Deleted Successfully!');
   }
}
