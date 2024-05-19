<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function role_list(){
        $data= UserRole::all();
        return view('admin.role.list',compact('data'));
    }
    public function add_role(){
        return view('admin.role.add');
    }
    public function insert_role(Request $request){
        $user = new UserRole;
        $user->role_name = trim($request->name);
        $user->created_by = Auth::user()->id;
        $user->save();
        return view('admin.role.add');
    }
}
