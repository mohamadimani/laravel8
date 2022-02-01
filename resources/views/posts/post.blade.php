@extends('layouts.base')

@section('head')
View Post
@endsection

@section('cssFiles')
@endsection

@section('content')  
    <div class="d-flex justify-content-between">
        <h4>
            <label for="title">{{$post->title}}</label>
        </h4>
        <span class=" ">{{carbonToJalaliDate($post->created_at)->format('%A, %d %B %Y');}}</span>
    </div>
    <div>
        <img src="{{asset('storage') .'/'. $post->image}}" alt="" class="form-control"> 
    </div> 
    <div>
        <label for="content">{{$post->content}}</label>
    </div> 
@endsection

@section('jsFiles')
@endsection