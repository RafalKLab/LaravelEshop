@extends('template.default')
@section('title', 'Home')
@section('content')

            <h1>All products</h1>
            <form method="GET">
                <div class="filters row">
                    <div class="col-sm-6 col-md-5">
                        <label for="price_from">
                            Price from
                            <input type="text" name="price_from" id="price_from" size="6" value="{{request()->price_from}}">
                        </label>
                        <label for="price_to">
                            to
                            <input type="text" name="price_to" id="price_to" size="6" value="{{request()->price_to}}">
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="filter_category">Category filter
                        <select class="form-select" aria-label="Select category" name="filter_category" id="filter_category">
                            <option value="">All</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request()->filter_category == $category->id ? "selected" : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{route('home')}}" class="btn btn-warning">Clear</a>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach($products as $product )
                    @include('card', compact('product'))
                @endforeach
            </div>
            {{$products->links()}}
@endsection
