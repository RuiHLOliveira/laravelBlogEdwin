@extends('layouts.admin')

@section('content')

<style>
.pageContainer {
    display: flex;
    flex-direction: column;
}
</style>
<div class="pageContainer">

    <div class="pageTitle">
        <h1>create users</h1>
    </div>

    <div class="formContainer">
        {{-- users.store --}}
        <form class="formFlex" enctype="multipart/form-data" method="POST" action="{{route('users.store')}}">
            @csrf

            <label class="formLabel bold" for="name">name</label>
            <input class="formInput" type="text" name="name" id="" required>
            @error('name')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="email">email</label>
            <input class="formInput" type="text" name="email" id="" required>
            @error('email')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="role">role</label>
            <select class="formInput" name="role" id="" required>
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

            <label class="formLabel bold" for="status">status</label>
            <select class="formInput" name="status" id="" required>
                <option selected value="active">active</option>
                <option value="notactive">notactive</option>
            </select>
            @error('status')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="pass">pass</label>
            <input class="formInput" type="password" name="pass" id="" required>
            @error('pass')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="photo">photo</label>
            <input type="file" enctype="multipart/form-data" accept=".jpg, .jpeg, .png" name="photo" id="" >
            @error('photo')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <input class="btn btnSuccess" type="submit" value="Create">
        </form>
    </div>
</div>

@endsection