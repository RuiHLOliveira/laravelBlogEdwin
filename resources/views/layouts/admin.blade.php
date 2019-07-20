<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/886bf3cc12.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="admin-page">

<header class="flexRowInside systemName">
    <a href="">sysname</a>
</header>

<div class="flexColInside">
    
    {{-- navbar --}}
    <nav class="flexRowInside">
        @if(auth()->guest())
            @if(!Request::is('auth/login'))
                <a href="{{ url('/auth/login') }}">Login</a>
            @endif
            @if(!Request::is('auth/register'))
                <a href="{{ url('/auth/register') }}">Register</a>
            @endif
        @else
            <a href="{{ url('/auth/logout') }}">Logout</a>
            <a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a>
        @endif
        <a href="">User Profile</a>
        <a href="">Settings</a>
        <a href="">Logout</a>
        <a href="">Dashboard</a>
        <span>Users</span>
        <a href="">All Users</a>
        <a href="">Create User</a>
        <span>Posts</span>
        <a href="">All Posts</a>
        <a href="">Create Post</a>
        <span>Categories</span>
        <a href="">All Categories</a>
        <a href="">Create Categoriy</a>
    </nav>
    {{-- navbar end --}}

    {{-- content --}}
    <div class="content">
        @yield('content')
    </div>
    {{-- content end --}}

</div>

<div class="flexRowInside">
    @yield('footer')
</div>

</body>
</html>
