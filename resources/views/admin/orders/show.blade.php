@extends('admin.template.defaultAdmin')
@section('title', 'Order')
@section('content')
    <div class="col-md-12">
                <h4>Order: {{$order->id}}</h4>
                <h4>Customer name: {{$order->name}}</h4>
                <h4>Customer contact phone: {{$order->phone}}</h4>
                <h4>Customer email address: {{$order->email}}</h4>
        <div class="panel">
            <table class="table table-striped">
                <thed>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Value</th>
                    </tr>
                </thed>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route("product", [$product->category->code, $product->code])}}">
                                <img height="56px" src="{{ asset('storage/' . $product->image) }}" alt="">
                                {{$product->name}}
                            </a>
                        </td>
                        <td>
                            <span class="blade">{{$product->pivot->count}}</span>
                        </td>
                        <td>{{$product->price}} Eur</td>
                        <td>{{$product->getPriceCount()}} Eur</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total price:</td>
                    <td>{{ $order->getFullPrice() }} Eur.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group" role="group">
            <form action="{{route('adminDeleteOrder', [$order->id])}}" method="POST">
                @if($order->status==1)
                    <a href="{{route('adminCompleteOrder', [$order->id])}}" class="btn btn-success" type="button">Mark as complete</a>
                @endif
                @csrf
                <input type="submit" class="btn btn-danger show_confirm" value="Delete">
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
            <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        </div>
    </div>
@endsection

