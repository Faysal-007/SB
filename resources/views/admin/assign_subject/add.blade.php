@extends('admin.layouts.admin_master')
@section('title')
    Assign a Subject
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Assign Subject to a class</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('/admin/assign_subject/insert') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="class_id" class="form-control">
                                            <option value="1">Select</option>
                                            @foreach ($Cdata as $Cvalue)
                                                <option value="{{ $Cvalue->id }}">{{ $Cvalue->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        @foreach ($Sdata as $Svalue)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="subject_id[]" value="{{$Svalue->id}}">
                                                <label class="form-check-label">{{ $Svalue->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
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
            </div>
            <section>
    </div>
@endsection
