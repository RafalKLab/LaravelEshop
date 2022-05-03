@extends('template.default')
@section('title', 'Home')
@section('content')
            <h1>All products</h1>
            <form method="GET" action="{{route('search')}}" class="form-inline my-2 my-lg-0 ml-2">
                <input name="query" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <br>
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
                    <div class="col-sm-6 col-md-4">
                        <label for="filter_category">Manufacturer filter
                            <select class="form-select" aria-label="Select manufacturer" name="filter_manufacturer" id="filter_manufacturery">
                                <option value="">All</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}" {{request()->filter_manufacturer == $manufacturer->id ? "selected" : ''}}>{{$manufacturer->name}}</option>
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
                @if(!count($products))
                    <div class="alert alert-info" role="alert">
                        There is no products for such filters!
                    </div>
                @endif
                @foreach($products as $product )
                    @include('card', compact('product'))
                @endforeach
            </div>
            {{$products->links()}}
@endsection
