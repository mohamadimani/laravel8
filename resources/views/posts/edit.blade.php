@extends('layouts.base')

@section('head')
<title>Edit Posts</title>
@endsection

@section('content')
<h2>New Posts !</h2>
<form action="{{route('updatePost' , $postId->id)}}" class="form-control" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{old('title') ?: $postId->title  }}">
    </div>
    <div>
        <label for="content">text</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') ?: $postId->content }}</textarea>
    </div>
    <div>
        <label for=" "> </label>
        <input type="submit" name="submit" value="submit" class="form-control btn btn-info">
    </div>
</form>
@endsection