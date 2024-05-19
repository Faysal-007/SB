@extends('user.layouts.user_master')
@section('title')
School Home
@endsection
@section('carousel')
<!-- Courses Start -->
<div class="container-xxl py-3">
    <div class="container">
        {{-- <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div> --}}
        <div class="row g-4 justify-content-center">
            @foreach ( $blog as $publicblog )
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{route('blog_post',['slug'=>$publicblog->slug])}}"><div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" style="height: 260px;width: 260px" src="thumbnail/{{$publicblog->thumbnail}}" alt="">
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5 class="mb-4">{{$publicblog->title}}</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$publicblog->created_by}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$publicblog->created_at}}</small>
                        
                    </div>
                </div></a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Courses End -->
@endsection
