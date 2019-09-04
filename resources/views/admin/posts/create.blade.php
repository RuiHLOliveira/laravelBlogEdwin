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
        <h1>Create Posts</h1>
    </div>

    <div class="formContainer">
        <form class="formFlex" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label class="formLabel bold" for="category_id">Category</label>
            <select class="formInput" name="category_id" id="category_id">
                <option selected disabled value="">select one</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}
                @endforeach
            </select>
            @error('category_id')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="photo">Photo</label>
            <input class="formInput" type="file" enctype="multipart/form-data" accept=".jpg, .jpeg, .png" name="photo" id="" >
            @error('photo')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="title">Title</label>
            <input class="formInput" type="title" name="title" id="" required>
            @error('title')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <label class="formLabel bold" for="body">Body</label>
            <textarea class="formInput" name="body" id="body" rows="10"></textarea>
            @error('body')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror


            <div>
                <a href="{{ route('admin.posts.index') }}" class="btn btnPrimary">Back</a>
                <input class="btn btnSuccess" type="submit" value="Create Post">
            </div>
        </form>
    </div>
</div>

@endsection