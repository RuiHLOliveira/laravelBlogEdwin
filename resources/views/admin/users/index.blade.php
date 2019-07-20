@extends('layouts.admin')

@section('content')

<div class="flexRow">
    <h1>meus users</h1>
</div>
<div class="flexRow">
    <table class="tableBorder fullWidthTable tableCell centerText">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created at</th>
                <th>Modified at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'active' : 'not active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection