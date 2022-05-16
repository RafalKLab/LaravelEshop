@extends('admin.template.defaultAdmin')
@section('title', 'Category: '. $category->name)
@section('content')
    <div class="col-md-12">
        <h1>Category</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Atribute</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Id</td>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <td>Code</td>
                    <td>{{$category->code}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td>Lithuanian name</td>
                    <td>{{$category->lt_name}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{$category->description}}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="{{ asset('storage/' . $category->image) }}" height="240px"></td>
                </tr>
                <tr>
                    <td>Products count:</td>
                    <td>{{$category->products->count()}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

