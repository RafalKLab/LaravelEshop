@extends('template.default')
@section('title', 'Categories')
@section('content')
            @foreach($categories as $category)
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel">
                            <a href="{{ route('category', $category->code)}}">
                                <img src="{{ asset('storage/' . $category->image) }}" height="150px" width="150px">
                                @if(session()->get('locale') == 'lt')
                                    <h2>{{ $category->lt_name }}</h2>
                                @else
                                    <h2>{{ $category->name }}</h2>
                                @endif
                            </a>
                    </div>
                </div>
            @endforeach
@endsection
