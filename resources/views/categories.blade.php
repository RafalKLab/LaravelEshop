@extends('template.default')
@section('title', 'Categories')
@section('content')
            @foreach($categories as $category)
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel">
                            <a href="{{ route('category', $category->code)}}">
                                <img src="{{ Storage::url($category->image) }}" height="150px" width="150px">
                                <h2>{{ $category->name }}</h2>
                            </a>
                            <p>
                                {{ $category->description }}
                            </p>
                    </div>
                </div>
            @endforeach
@endsection
