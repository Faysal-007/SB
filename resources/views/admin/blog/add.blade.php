@extends('admin.layouts.admin_master')
@section('title')
Add Blog 
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('insert_blog')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Enter title">
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>category</label>
                                    <select name="category" class="form-control">
                                        @foreach ($data as $cdata)
                                        <option value="{{$cdata->name}}">{{$cdata->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>subtitle</label>
                                    <input type="text" class="form-control" name="subtitle"
                                        placeholder="Enter subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image_title</label>
                                <input type="text" class="form-control" name="image_title"
                                    placeholder="Enter image_title">
                            </div>
                            <div class="form-group">
                                <label>description</label>
                                <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Enter description"></textarea>
                            </div>
                           <div class="row">
                            <div class="form-group col-6">
                                <label>Main Image</label>
                                <input type="file" class="form-control" name="content_image"
                                    placeholder="upload content image">
                            </div>
                            <div class="form-group col-6">
                                <label>Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail"
                                    placeholder="upload thumbnail image">
                            </div>
                           </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
    </section>
  </div>
@endsection