@extends('admin.template.defaultAdmin')
@section('title', 'Products')
@section('content')
    <div class="col-md-12">
        <h1>Categories</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->code}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('categories.destroy', $category)}}" method="POST">
                            <a href="{{route('categories.show', $category)}}" class="btn btn-success" type="button">View</a>
                            <a href="{{route('categories.edit', $category)}}" class="btn btn-warning" type="button">Edit</a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger show_confirm" value="Delete" onclick="mes()">
                            </form>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                            <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
        <hr>
        <a href="{{route('categories.create')}}" class="btn btn-success show_confirm" type="button">Add new category</a>
    </div>
@endsection

