@extends('template.default')
@section('title', 'Category')
@section('content')
            <h1>
                {{$categoryObject->name}} <small>({{$categoryObject->products->count()}})</small>
            </h1>
            <p>
                {{$categoryObject->description}}
            </p>
            <div class="row">
                @foreach($categoryObject->products as $product )
                    @include('card', compact('product'))
                @endforeach
            </div>

@endsection
