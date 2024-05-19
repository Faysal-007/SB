@extends('user.layouts.user_master')
@section('title')
School Home
@endsection

@section('carousel')
@include('user.home.carousel')
@endsection

@section('service')
@include('user.home.service')
@endsection

@section('about')
@include('user.home.about')
@endsection

@section('Categories')
@include('user.home.Categories')
@endsection

@section('courses')
@include('user.home.courses')
@endsection

@section('team')
@include('user.home.team')
@endsection

@section('testimonial')
@include('user.home.testimonial')
@endsection







