@extends('layouts.base')

@section('head')
View Post
@endsection

@section('cssFiles')
@endsection

@section('content')  
    <div>
        <h4>
            <label for="title">{{$post->title}}</label>
        </h4>
    </div>
    <div>
        <label for="content">{{$post->content}}</label>
    </div> 
@endsection

@section('jsFiles')
@endsection