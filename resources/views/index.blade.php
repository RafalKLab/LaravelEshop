@extends('template.default')
@section('title', 'Home')
@section('content')
            <h1>All products</h1>
            <div class="row">
                @foreach($products as $product )
                    @include('card', compact('product'))
                @endforeach
            </div>
            {{$products->links()}}
@endsection
