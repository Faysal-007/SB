@extends('admin.layouts.admin_master')
@section('title')
User List 
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-top:10px">
                @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong> {{ session()->get('message') }}</strong>
                  </div>
                @endif
              <div class="card-header">
                <div class="search_area">
                  <form action="{{ url('admin/admin/list') }}" method="get">
                      <div class="row">
                          <div class="col-md-3 form-group">
                              <input type="text" name="name" class="form-control" placeholder="search by name" value="{{ Request::get('name') }}"
                                  class="mod_form_css">
                          </div>
                          <div class="col-md-3 form-group">
                              <div>
                                  <button class="btn btn-primary" type="submit">Search</button>
                                  <a href="{{ url('admin/admin/list') }}" class="btn btn-primary">Reset</a>
                              </div>
                          </div>
                          <div class="add_area col-md-3" style="position: absolute;right: 0">
                            <a class="btn btn-primary" style="float:right" href="{{url('/admin/admin/add')}}">Add User</a>
                          </div>
                      </div>
                  </form>
                </div>
                
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Phone</th>
                      <th>User Type</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->phone}}</td>
                      <td>{{$value->usertype}}</td>
                      <td><a class="btn btn-primary" href="{{url('/admin/admin/edit',$value->id)}}">Edit</a></td>
                      <td><a class="btn btn-danger" href="{{url('/admin/admin/delete',$value->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection