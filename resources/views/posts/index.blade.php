@extends('layouts.base')

@section('head')
<title>Posts list</title>
<style>
    table.table td {
        text-align: center;
    }
</style>
@endsection

@section('content')

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">عنوان</th>
            <th scope="col">متن</th>
            <th scope="col">مشاهده</th> 
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key => $post)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$post->title}}</td>
            <td>{{shorterText($post->content)}}</td>
            <td><a href="{{route('editPost', $post->id )}}"><svg width="19" height="19" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg></a></td>
            <td><a href="{{route('editPost', $post->id )}}" class="btn btn-info btn-sm">ویرایش</a></td>
            <td>
                <form method="POST" action="{{route('deletePost', $post->id)}}">
                    @csrf
                    @method('delete')
                    <input type="submit" name="submit" value="حذف" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                </form>
            </td>
        </tr>
        @endForeach
    </tbody>
</table>


@endsection