@extends('template.default')
@section('title', 'Category')
@section('content')

    @if(session()->get('locale') == 'lt')
        <h1>{{ $categoryObject->lt_name }}<small>({{$categoryObject->products->count()}})</small></h1>
    @else
        <h1>{{ $categoryObject->name }}<small>({{$categoryObject->products->count()}})</small></h1>
    @endif

    <div class="row">
        @foreach($categoryObject->products as $product )
            @include('card', compact('product'))
        @endforeach
    </div>
@endsection
