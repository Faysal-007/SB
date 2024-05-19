<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class Subject_Controller extends Controller
{
    public function list_subject(Request $request){

        $data = SubjectModel::select('subject_models.*','users.name as created_by')
            ->join('users','users.id','subject_models.created_by')
            ->Where('subject_models.is_delete','=','0');

        if(!empty($request->name)){
            $data = $data
            ->where('users.name','LIKE','%'.$request->name.'%')->get();
         }

        else{  
            $data = $data->get();
            
        }
        return view('admin.subjects.list',compact('data'));
         
    }
    public function add_subject(){
        return view('admin.subjects.add');
    }
    public function insert_subject(Request $request){
        $user = new SubjectModel;
        $user->name = trim($request->name);
        $user->status = trim($request->status);
        $user->created_by = Auth::user()->id;
        $user->save();
        return redirect('admin/subject/list')->with('message','Added Successfully!');
    }
    public function edit_subject($id){
        $data = SubjectModel::find($id);
        return view('admin.subjects.edit',compact('data'));
     }
     public function update_subject(Request $request,$id){
        $user = SubjectModel::find($id);
        $user->name = trim($request->name);
        $user->status = trim($request->status);
        $user->created_by = Auth::user()->id;
        $user->update();
        return redirect('admin/subject/list')->with('message','Updated Successfully!');
     }
     public function delete_subject($id){
        $user = SubjectModel::find($id);
        $user->is_delete=(1);
        $user->update();
        return redirect('admin/subject/list')->with('message','Deleted Successfully!');
    }
}
