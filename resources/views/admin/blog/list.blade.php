@extends('admin.layouts.admin_master')
@section('title')
Blog List 
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
                  <form action="{{ url('/admin/blog/list') }}" method="get">
                      <div class="row">
                          <div class="col-md-3 form-group">
                              <input type="search" name="name" class="form-control" placeholder="Author name or Title" value="{{ Request::get('name') }}"
                                  class="mod_form_css">
                          </div>
                          <div class="col-md-3 form-group">
                              <div>
                                  <button class="btn btn-primary" type="submit">Search</button>
                                  <a href="{{ url('/admin/blog/list') }}" class="btn btn-primary">Reset</a>
                              </div>
                          </div>
                          <div class="col-md-3" style="position: absolute;right: 0">
                            <a class="btn btn-primary" style="float:right" href="{{url('/admin/blog/add')}}">Add Blog</a>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>subtitle</th>
                      <th>Tittle</th>
                      <th>Description </th>
                      <th>Thumbnail</th>
                      <th>Content Image</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th colspan="3" style="text-align: center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->title}}</td>
                      <td>{{$value->category}}</td>
                      <td>{{$value->subtitle}}</td>
                      <td>{{$value->image_title}}</td>
                      <td>{{$value->description}}</td>
                      <td><img style="height:50px;width:60px" src="thumbnail/{{$value->thumbnail}}" alt="Avatar" class="rounded-circle" /></td>
                      <td><img style="height:50px;width:60px" src="content_image/{{$value->content_image}}" alt="Avatar" class="rounded-circle" /></td>
                      <td>
                        @if ($value->is_published==0)
                          Not Published
                        @else
                          Published
                        @endif
                      </td>
                      <td>
                        @if ($value->created_by==1)
                          Admin
                        @else
                          User
                        @endif
                      </td>
                      <td><a class="btn btn-primary" href="{{url('/admin/blog_category/edit',$value->id)}}">Edit</a></td>
                      <td><a class="btn btn-danger" href="{{url('/admin/blog_category/delete',$value->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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