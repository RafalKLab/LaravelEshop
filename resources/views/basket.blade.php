@extends('template.default')
@section('title', 'Shopping Cart')
@section('content')
    <h1>Basket</h1>
    <div class="panel">
        <table class="table table-striped">
            <thed>
                <tr>
                    <th>@lang('main.name')</th>
                    <th>@lang('main.quantity')</th>
                    <th>@lang('main.price')</th>
                    <th>@lang('main.value')</th>
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
                    <td><span class="blade">{{$product->pivot->count}}</span>
                        <div class="btn-group form-inline">
                            <form action="{{route('basketRemove', $product)}}" method="post">
                                <button type="submit" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                            <form action="{{route('basketAdd', $product)}}" method="post">
                                <button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{$product->price}} Eur</td>
                    <td>{{$product->getPriceCount()}} Eur</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">@lang('main.tot_price'):</td>
                <td>{{ $order->getFullPrice() }} Eur.</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{route('basketPlace')}}">@lang('main.confirm')</a>
        </div>
    </div>
@endsection
