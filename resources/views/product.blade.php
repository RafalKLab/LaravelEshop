@extends('template.default')
@section('title', 'Product')
@section('content')
    <h1>@lang('main.about_product')</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ Storage::url($product->image) }}" alt="" width="400px">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h4>{{ $product->name }}</h4></li>
                            <li class="list-group-item">@lang('main.category'):
                                @if(session()->get('locale') == 'lt')
                                    {{ $product->category->lt_name }}
                                @else
                                    {{ $product->category->name }}
                                @endif
                            </li>
                            <li class="list-group-item">@lang('main.price') <b>{{ $product->price }} Eur </b></li>
                            <li class="list-group-item">
                                @if(session()->get('locale') == 'lt')
                                    <p>{{ $product->lt_description }}</p>
                                @else
                                    <p>{{ $product->description }}</p>
                                @endif
                            </li>
                            <li class="list-group-item"><form action="{{route('basketAdd', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-primary" role="button">@lang('main.toBasket')</button>
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
@endsection
