@extends('layouts.base')

@section('head')
Edit Posts
@endsection

@section('cssFiles')
@endsection

@section('content')
<h2>New Posts !</h2>
<form action="{{route('posts.update' , $post->id)}}" class="form-control" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{old('title') ?? $post->title  }}">
    </div>
    <div>
        <label for="content">text</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') ?? $post->content }}</textarea>
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <div>
        <label for=" "> </label>
        <input type="submit" name="submit" value="submit" class="form-control btn btn-info">
    </div>
</form>
@endsection

@section('jsFiles')
@endsection