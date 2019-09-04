@extends('layouts.admin')

@section('content')

<style>
.pageContainer {
    display: flex;
    flex-direction: column;
}
.centered {
    margin: 0 auto;
}
.postEditPic{
    /* max-width: 200px; */
    max-height: 200px;
}
</style>
    
<div class="pageContainer">

    <div class="pageTitle">
        <h1>Edit Post</h1>
    </div>
    
    <div class="formContainer">
        <form class="formFlex" action="{{ route('admin.posts.update',['post_id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @if ($post->photo)
                <img class="postEditPic centered" src="{{asset('images').'/'.$post->photo->file}}">
            @else
                post has no image
            @endif
            
            <label class="formLabel bold" for="category_id">Category</label>
            <select class="formInput" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option 
                    @if( $post->category->id == $category->id)
                        selected
                    @endif
                    value="{{ $category->id }}">{{ $category->name }}
                @endforeach
            </select>
            @error('category_id')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror
            
            <label class="formLabel bold" for="photo">Change Photo</label>
            <input class="formInput" type="file" enctype="multipart/form-data" accept=".jpg, .jpeg, .png" name="photo" id="" >
            @error('photo')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="title">Title</label>
            <input class="formInput" type="title" name="title" id="" value="{{ $post->title }}" required>
            @error('title')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="body">Body</label>
            <textarea class="formInput" name="body" id="body" rows="10">{{ $post->body }}</textarea>
            @error('body')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <a href="{{ route('admin.posts.index') }}" class="btn btnPrimary">Back</a>
                <input class="btn btnSuccess" type="submit" value="Update Post">
                <input class="btn btnDanger" type="submit" form="deleteForm" value="Delete Post">
            </div>

        </form>
        <form id="deleteForm" action="{{ route('admin.posts.destroy',['post_id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')
        </form>

    </div>
</div>

@endsection