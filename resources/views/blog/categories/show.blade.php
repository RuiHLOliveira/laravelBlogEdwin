@extends('layouts.blog')

@section('content')

<div class="row">
    <div class="col text-center"><h2>{{ $category->name }}</h2></div>
</div>
<style>
</style>
@if(count($category->posts)==0)
<div class="row">
    <div class="colXl10 colLg9 colMd12 colSm12 colXs12 postContainer">
        Sem posts por aqui...
    </div>
</div>
@endif
@foreach ($category->posts as $post)
    <div class="row">
        <div class="colXl10 colLg9 colMd12 colSm12 colXs12 postContainer">
            <a class="link" href="{{ route('posts.show',['post_id' => $post->id]) }}">
                <h3 class="postTitle">{{ $post->title }}</h3>
            </a>
            <div class="postText">{{ str_limit($post->body,200) }}</div>
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
        </div>
    </div>
@endforeach

@endsection