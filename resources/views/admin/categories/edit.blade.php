@extends('layouts.admin')

@section('content')

<div class="pageContainer">

    <div class="pageTitle">
        <h1>Edit Category</h1>
    </div>

    <div class="formContainer">
        <form class="formFlex" action="{{ route('admin.categories.update',['category_id'=>$category->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <label for="name" class="formLabel bold">Name</label>
            <input type="text" name="name" id="name" class="formInput" value="{{ $category->name }}">
            @error('name')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <div>
                <a href="{{ route('admin.categories.index') }}" class="btn btnPrimary">Back</a>
                <input class="btn btnSuccess" type="submit" value="Update Category">
                <input class="btn btnDanger" type="submit" form="deleteForm" value="Delete Category">
            </div>
        </form>

        <form method="post" id="deleteForm" class="deleteForm" action="{{ route('admin.categories.destroy',['category_id'=>$category->id]) }}">
            @csrf
            @method('delete')
        </form>

    </div>
</div>

@endsection