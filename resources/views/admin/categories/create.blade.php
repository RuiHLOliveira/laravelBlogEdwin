@extends('layouts.admin')

@section('content')

<div class="pageContainer">

    <div class="pageTitle">
        <h1>Create Category</h1>
    </div>

    <div class="formContainer">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="formFlex" enctype="multipart/form-data">
            @csrf

            <label class="formLabel bold" for="name">Category Name</label>
            <input class="formInput" type="text" name="name" id="">
            @error('name')
                <div class="box boxDanger">
                    {{ $message }}
                </div>
            @enderror

            <input class="btn btnSuccess" type="submit" value="Create Category">
        </form>
    </div>

</div>

@endsection