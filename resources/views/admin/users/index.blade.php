@extends('layouts.admin')

@section('content')

<style>
.profilePic {
    border-radius: 15%;
    width: 40px;
    height: 40px;
}

</style>

<div class="pageTitle">
    <h1>All Users</h1>
</div>

<div class="topLinks">
    <a class="btn btnPrimary" href="{{ route('admin.users.create') }}">Create User</a>
</div>

<div>
    <table class="tableBorder fullWidthTable tableCell noCenterThead">
        <thead>
            <tr>
                <th>Profile Pic</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    @if ($user->photo)
                        <img class="profilePic" src="{{ asset('images').'/'.$user->photo->file }}">
                    @else
                        <img class="profilePic" src="{{ asset('images/stdavatar.png') }}">
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role)
                        {{ $user->role->name }}
                    @else
                        no role
                    @endif
                </td>
                <td>{{ $user->is_active == 1 ? 'active' : 'not active' }}</td>
                <td><a class="link" href="{{ route('admin.users.edit',['user_id' => $user->id]) }}"><i class="far fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection