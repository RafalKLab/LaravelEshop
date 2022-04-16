@extends('admin.template.defaultAdmin')
@section('title', 'Orders')
@section('content')
    <div class="col-md-12">
        @if(count($orders))
            @if($orders->first()->status == 1)
                <h1>Pending orders: <small>({{count($orders)}})</small></h1>
            @else
                <h1>Completed orders: <small>({{count($orders)}})</small></h1>
            @endif
        @endif
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date:</th>
                <th>Total price</th>
                <th>Actions</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->created_at->format('H:i d/m/y')}}</td>
                    <td>{{$order->getFullPrice()}} Eur.</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a type="button" class="btn btn-success" href="{{route('adminShowOrder', [$order->id])}}">View</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
@endsection

