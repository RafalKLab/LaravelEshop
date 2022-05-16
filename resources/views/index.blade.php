@extends('template.default')
@section('title', 'Home')
@section('content')
            <h1>@lang('main.all_products')</h1>
            <form method="GET" action="{{route('search')}}" class="form-inline my-2 my-lg-0 ml-2">
                <input name="query" class="form-control mr-sm-2" type="text" placeholder="@lang('main.search')" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">@lang('main.search')</button>
            </form>
            <br>
            <form method="GET">
                <div class="filters row">
                    <div class="col-sm-6 col-md-5">
                        <label for="price_from">
                            @lang('main.price_from')
                            <input type="text" name="price_from" id="price_from" size="6" value="{{request()->price_from}}">
                        </label>
                        <label for="price_to">
                            @lang('main.price_to')
                            <input type="text" name="price_to" id="price_to" size="6" value="{{request()->price_to}}">
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="filter_category">@lang('main.cat_fil')
                        <select class="form-select" aria-label="Select category" name="filter_category" id="filter_category">
                            <option value="">@lang('main.all')</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request()->filter_category == $category->id ? "selected" : ''}}>
                                    @if(session()->get('locale') == 'lt')
                                        {{ $category->lt_name }}
                                    @else
                                        {{ $category->name }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="filter_category">@lang('main.man_fil')
                            <select class="form-select" aria-label="Select manufacturer" name="filter_manufacturer" id="filter_manufacturery">
                                <option value="">@lang('main.all')</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}" {{request()->filter_manufacturer == $manufacturer->id ? "selected" : ''}}>{{$manufacturer->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                        <a href="{{route('home')}}" class="btn btn-warning">@lang('main.clear')</a>
                    </div>
                </div>
            </form>

            <div class="row">
                @if(!count($products))
                    <div class="alert alert-info" role="alert">
                        @lang('main.no_products_with_filters')
                    </div>
                @endif
                @foreach($products as $product )
                    @include('card', compact('product'))
                @endforeach
            </div>
            {{$products->links()}}
@endsection
