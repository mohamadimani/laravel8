<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('head')
    <link href="{{asset('accets/style.css')}}" rel="stylesheet">
    <link href="{{asset('accets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">

        <ul class="nav justify-content-end nam_menu">
            <li class="nav-item">
                <a class="nav-link @if(currentMenu()=='') active @endif" aria-current="page" href="{{url('')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(currentMenu()=='posts') active @endif" href="{{route('posts')}}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(currentMenu()=='newPost') active @endif" href="{{route('newPost')}}">New Post</a>
            </li>
            <li class="nav-item">
            </li>
        </ul>
        <div class="clear-both"></div>
        <hr>
        <div class="row">

            <div class="col-md-6">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif

                @yield('content')

            </div>

        </div>
        <br>
        <a href="{{url('')}}" class="btn btn-info">Go back home</a>
    </div>
</body>

</html>