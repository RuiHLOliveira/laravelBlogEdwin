@extends('layouts.admin')

@section('content')

<style>
.postIndexPicSmall {
    /* border-radius: 15%; */
    max-width: 200px;
    /* max-height: 100px; */
}
.textBox {
    max-width: 200px;
    text-align: left;
}
</style>

<div class="pageTitle">
    <h1>All Comments</h1>
</div>

<div class="topLinks">
    <a class="btn btnPrimary" href="{{ route('admin.posts.create') }}">Create Post</a>
</div>

                

{{-- <div class="">
    <table class="tableBorder fullWidthTable tableCell noCenterThead">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Author</th>
                <th>Category</th>
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
                <td>
                    @if ($post->photo)
                        <img class="postIndexPicSmall" src="{{asset('images').'/'.$post->photo->file}}">
                    @endif
                </td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->title }}</td>
                <td class="textBox">{{ str_limit($post->body,40) }}</td>
                <td>{{ $post->created_at->format('M d, Y - H:i:s ') }}</td>
                <td>{{ $post->updated_at->format('M d, Y - H:i:s ') }}</td>
                <td><a class="link" href="{{ route('admin.posts.edit',['post_id' => $post->id]) }}"><i class="far fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div> --}}

@endsection