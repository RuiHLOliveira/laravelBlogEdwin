@extends('layouts.admin')

@section('content')

<style>
.profilePic {
    /* border-radius: 15%; */
    width: 100px;
    height: 100px;
}
.textBox {
    max-width: 200px;
    text-align: left;
}
</style>

<div class="pageTitle">
    <h1>All Posts</h1>
</div>

<div class="">
    <table class="tableBorder fullWidthTable tableCell centerText">
        <thead>
            <tr>
                <th>Author</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td>
                    @if ($post->photo)
                        <img class="profilePic" src="{{asset('images').'/'.$post->photo->file}}">
                    @endif
                </td>
                <td>{{$post->title}}</td>
                <td class="textBox">{{substr($post->body,0,200)}}...</td>
                <td>{{$post->created_at->format('M d, Y - H:i:s ')}}</td>
                <td>{{$post->updated_at->format('M d, Y - H:i:s ')}}</td>
                <td><a class="link" href=""><i class="far fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection