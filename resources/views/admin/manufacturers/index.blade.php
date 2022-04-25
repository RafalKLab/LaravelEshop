@extends('admin.template.defaultAdmin')
@section('title', 'Manufacturers')
@section('content')
    <div class="col-md-12">
        <h1>Manufacturers</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach($manufacturers as $manufacturer)
                <tr>
                    <td>{{$manufacturer->id}}</td>
                    <td>{{$manufacturer->name}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('manufacturers.destroy', $manufacturer->id)}}" method="POST">
                                <a href="{{route('manufacturers.edit', $manufacturer->id)}}" class="btn btn-warning" type="button">Edit</a>
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
        {{$manufacturers->links()}}
        <hr>
        <a href="{{route('manufacturers.create')}}" class="btn btn-success show_confirm" type="button">Add new manufacturer</a>
    </div>
@endsection

