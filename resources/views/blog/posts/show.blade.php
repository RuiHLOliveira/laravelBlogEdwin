@extends('layouts.blog')

@section('content')

<style>
.blockCenter {
    margin: 0 auto;
}
</style>

<div class="row">
    <div class="colXs12 colSm7 colMd8 colLg12 colXl10 blockCenter postContainer">
        <a class="link" href="{{ route('posts.show',['post_id' => $post->id]) }}">
            <h3 class="postTitle">{{ $post->title }}</h3>
        </a>
        
        <span class="postAdditionalInfo">
            <a class="link" href="{{ route('users.show',['user_id' => $post->user->id]) }}">
                {{ $post->user->name }}
            </a>
            em
            <a class="link" href="{{ $post->category->id }}">
                {{ $post->category->name }}
            </a>
            postado em {{ $post->created_at->format('d/m/Y') }}
        </span>
        
        <div class="postText" style="white-space:pre-wrap;">{{ $post->body }}</div>
    </div>
</div>

@endsection