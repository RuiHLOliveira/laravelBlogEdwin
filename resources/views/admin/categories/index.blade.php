@extends('layouts.admin')

@section('content')

<div class="pageContainer">

    <div class="pageTitle">
        <h1>Categories</h1>
    </div>

    <table class="tableBorder fullWidthTable tableCell noCenterThead">
        <thead>
            <tr>
                <th>Name</th>
                <th>options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a class='link' href="{{ route('admin.categories.edit',['category_id'=>$category->id]) }}"><i class='far fa-edit'></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection