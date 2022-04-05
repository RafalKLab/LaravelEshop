@extends('template.default')
@section('title', 'Product')
@section('content')
            <h1>{{ $product->name }}</h1>
            <h4>Category: {{$product->category->name}}</h4>
            <p>Price <b>{{ $product->price }} Eur</b></p>
            <img src="{{ Storage::url($product->image) }}" alt="" width="400px">
            <p>{{ $product->description }}</p>
            <form action="{{route('basketAdd', $product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">Add to basket</button>
                @csrf
            </form>
@endsection
