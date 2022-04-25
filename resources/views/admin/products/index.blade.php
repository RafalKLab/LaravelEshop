@extends('admin.template.defaultAdmin')
@section('title', 'Products')
@section('content')
    <div class="col-md-12">
        <h1>Products</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Manufacturer</th>
                <th>Name</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->category->name }}</td>
                    <td>{{$product->manufacturer->name }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('products.destroy', $product)}}" method="POST">
                                <a href="{{route('products.show', $product)}}" class="btn btn-success" type="button">View</a>
                                <a href="{{route('products.edit', $product)}}" class="btn btn-warning" type="button">Edit</a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger show_confirm" value="Delete">
                            </form>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                            <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
        <hr>
        <a href="{{route('products.create')}}" class="btn btn-success" type="button">Add new product</a>
    </div>
@endsection

