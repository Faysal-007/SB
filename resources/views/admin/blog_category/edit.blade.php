@extends('admin.layouts.admin_master')
@section('title')
Edit Category
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('/admin/blog_category/update',$data->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{$data->name}}" placeholder="Class Name">
                                </div>
                                <div class="form-group">
                                    <label>title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{$data->title}}" placeholder="Class Name">
                                </div>
                                <div class="form-group">
                                    <label>meta_title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{$data->meta_title}}" placeholder="Class Name">
                                </div>
                                <div class="form-group">
                                    <label>meta_description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        value="{{$data->meta_description}}" placeholder="Class Name">
                                </div>
                                <div class="form-group">
                                    <label>meta_keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        value="{{$data->meta_keyword}}" placeholder="Class Name">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option {{($data->status == 1) ? 'selected' : ''}} value="1">Active</option>
                                        <option {{($data->status == 0) ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section>
        </div>
        @endsection
