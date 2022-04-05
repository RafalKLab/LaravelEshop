@extends('admin.template.defaultAdmin')
@section('title', 'Orders')
@section('content')
    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Date:</th>
                <th>Total price</th>
                <th>Actions</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->format('H:i d/m/y')}}</td>
                    <td>{{$order->getFullPrice()}} Eur.</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a type="button" class="btn btn-success" href="">View</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
@endsection

