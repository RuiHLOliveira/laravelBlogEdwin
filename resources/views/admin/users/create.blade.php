@extends('layouts.admin')

@section('content')

<div class="flexRowInside centerText">
    <h1>create users</h1>
</div>

<div class="flexColInside">
    {{-- users.store --}}
    <form class="flexRowInside maxWidth800" method="POST" action="{{route('users.store')}}">
        @csrf

        <label class="bold" for="name">name</label>
        <input type="text" name="name" id="">
        @error('name')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <label class="bold" for="email">email</label>
        <input type="text" name="email" id="">
        @error('email')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <label class="bold" for="role">role</label>
        <select name="role" id="">
            <option selected disabled value="">Choose one</option>
            @foreach ($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error('role')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <label class="bold" for="status">status</label>
        <select name="status" id="">
            <option value="active">active</option>
            <option value="notactive">notactive</option>
        </select>
        @error('status')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <label class="bold" for="pass">pass</label>
        <input type="password" name="pass" id="">
        @error('pass')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <label class="bold" for="photo">photo</label>
        <input type="file" name="photo" id="">
        @error('photo')
            <div class="box boxDanger">
                {{ $message }}
            </div>
        @enderror

        <input class="boxPrimary" type="submit" value="Create">
    </form>
</div>

@endsection