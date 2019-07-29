<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/886bf3cc12.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<style>
.fas{
    margin-right: 10px;
}

</style>


<body class="">

    <div class="systemContainer1">

        <div class="leftBarContainer">
            
            <a class="link" href=""><header class="systemName">sysname</header></a>

            {{-- navbar --}}
            <nav class="navFlex">
                @guest
                    <span><i class="fas fa-user"></i>Auth</span>
                    @if(!Request::is('auth/login'))
                        <a class="link" href="{{ url('/auth/login') }}">Login</a>
                    @endif
                    @if(!Request::is('auth/register'))
                        <a class="link" href="{{ url('/auth/register') }}">Register</a>
                    @endif
                @endguest
                
                <span><i class="fas fa-users"></i>Users</span>
                <a class="link" href="{{route('users.index')}}">All Users</a>
                <a class="link" href="{{route('users.create')}}">Create User</a>

                <span><i class="fas fa-file-alt"></i>Posts</span>
                <a class="link" href="{{route('posts.index')}}">All Posts</a>
                <a class="link" href="{{route('posts.create')}}">Create Post</a>

                <span><i class="fas fa-address-card"></i>Categories</span>
                <a class="link" href="">All Categories</a>
                <a class="link" href="">Create Categoriy</a>
            </nav>
            {{-- navbar end --}}

        </div>
        <div class="rightPageContainer">
            {{-- content --}}

            <div class="topbar">
                @auth
                    <span class="welcomeName">Welcome, {{Auth::user()->name}}</span>
                    <a class="link" href="{{ url('/auth/logout') }}">Logout</a>
                    <a class="link" href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a>
                    <a class="link" href="">Settings</a>
                @endauth
            </div>
                
            <div class="content">
                @yield('content')
            </div>

        </div>
        {{-- content end --}}
    </div>
</body>
</html>
