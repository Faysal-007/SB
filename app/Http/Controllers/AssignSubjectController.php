<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SubjectModel;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class AssignSubjectController extends Controller
{
    public function list_assign_subject(Request $request){

        if(!empty($request->search)){
            $data= AssignSubject::select('assign_subjects.*','class_models.name as class_name','subject_models.name as subject_name','users.name as created_by')
            ->join('class_models','class_models.id','assign_subjects.class_id')
            ->join('subject_models','subject_models.id','assign_subjects.subject_id')
            ->join('users','users.id','assign_subjects.created_by')
            ->where('subject_models.is_delete','=','0')
            ->Orwhere('class_name','LIKE','%'.$request->search.'%')
            ->Orwhere('subject_name','LIKE','%'.$request->search.'%')
            ->orderBy('class_name','asc')
            ->get();
            return view('admin.assign_subject.list',compact('data'));
        }
        
    }


    public function add_assign_subject(){
        $Cdata= ClassModel::select('class_models.*')
            ->where('class_models.is_delete','=','0')
            ->where('class_models.status','=','1')
            ->get();
        $Sdata= SubjectModel::select('subject_models.*')
            ->where('subject_models.is_delete','=','0')
            ->where('subject_models.status','=','1')
            ->get();
        return view('admin.assign_subject.add',compact('Cdata', 'Sdata'));
    }

    public function insert_assign_subject(Request $request){

        if(!empty($request->subject_id)){
            foreach ($request->subject_id as $subject_id) {
                $user = new AssignSubject;
                $user->class_id = trim($request->class_id);
                $user->subject_id = $subject_id;
                $user->status = trim($request->status);
                $user->created_by = Auth::user()->id;
                $user->save();
            }
            return redirect('admin/assign_subject/list')->with('message','Added Successfully!');
        }
        else{
            return redirect('admin/assign_subject/list')->with('message','Error!');
        }
        
        
    }
    public function edit_assign_subject($id){
        $data = AssignSubject::find($id);
        return view('admin.assign_subject.edit',compact('data'));
     }
     public function update_assign_subject(Request $request,$id){
        $user = AssignSubject::find($id);
        $user->name = trim($request->name);
        $user->status = trim($request->status);
        $user->created_by = Auth::user()->id;
        $user->update();
        return redirect('admin/assign_subject/list')->with('message','Updated Successfully!');
     }
     public function delete_assign_subject($id){
        $user = AssignSubject::find($id);
        $user->is_delete=(1);
        $user->update();
        return redirect('admin/assign_subject/list')->with('message','Deleted Successfully!');
    }
}
