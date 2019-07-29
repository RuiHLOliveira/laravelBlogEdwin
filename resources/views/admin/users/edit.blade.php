@extends('layouts.admin')

@section('content')

<script>
$(function() {
    console.log( "ready!" );
    $('#passwordLabel').toggle();
    $('#passwordField').toggle();

});

function toggleChangePassword () {
    $('#passwordLabel').toggle(200);
    $('#passwordField').toggle(200);
}
</script>
<style>
.profilePic {
    border-radius: 50%;
    max-width: 149px;
    max-height: 149px;
    margin: 0 20px;
}
.centered {
    margin: 0 auto;
}
.flexGrow0 {
    flex-grow: 0;
}
.pageContainer {
    display: flex;
    flex-direction: column;
}
</style>
<div class="pageContainer">
    <div class="pageTitle">
        <h1>Edit User</h1>
    </div>

    <div class="formContainer">
        <form class="formFlex" action="{{route('users.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
            {{-- users.store --}}
            @csrf
            @method('PUT')
            @if ($user->photo)
                <img class="profilePic centered" src="{{asset('images').'/'.$user->photo->file}}">
            @else
                <img class="profilePic centered" src="{{asset('images/stdavatar.png')}}">
            @endif

            <label class="formInput bold" for="name">name</label>
            <input class="formInput" required type="text" name="name" id="" value="{{$user->name}}">
            @error('name')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formInput bold" for="email">email</label>
            <input class="formInput" required type="text" name="email" id="" value="{{$user->email}}">
            @error('email')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formInput bold" for="role">role</label>
            <select class="formInput" required name="role" id="">
                @if ($user->role_id <= 0)
                    <option selected disabled value="">Choose one</option>
                @endif
                @foreach ($roles as $role)
                    <option 
                        @if ($role->id == $user->role_id)
                            selected
                        @endif
                    value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            @error('role')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formInput bold" for="status">status</label>
            <select class="formInput" required name="status" id="">
                <option 
                    @if ($user->is_active == 1)
                        selected
                    @endif
                value="active">active</option>
                <option 
                    @if ($user->is_active == 0)
                        selected
                    @endif
                value="notactive">notactive</option>
            </select>
            @error('status')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <button class="btn btnPrimary" type="button" onclick="toggleChangePassword()">Change Password</button>
            </div>

            <label class="formInput bold" for="pass" id="passwordLabel">pass</label>
            <input class="formInput" type="password" name="pass" id="passwordField">
            @error('pass')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formInput bold" for="photo">change your photo</label>
            <input class="formInput" type="file" enctype="multipart/form-data" accept=".jpg, .jpeg, .png" name="photo" id="" >
            @error('photo')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror
            <div class="flexColInside" style="justify-content: left;">
                <input class="flexGrow0 btn btnPrimary" type="submit" value="Back">
                <input class="flexGrow0 btn btnSuccess" type="submit" value="Update">
                <input class="flexGrow0 btn btnDanger" type="submit" value="Delete" form="formDelete">
            </div>
        </form>

        <form id="formDelete" style="display: inline;" action="{{route('users.destroy',[$user->id])}}" method="POST">
            @method('DELETE')
            @csrf
        </form>

    </div>
    
</div>

@endsection