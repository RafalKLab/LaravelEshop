<div class="col-sm-6 col-md-4 show_hover">
    <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="" role="button">
    <div class="thumbnail">
        <img src="{{ asset('storage/' . $product->image) }}" alt="">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} Eur</p>
            <p>
            <form action="{{route('basketAdd', $product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">@lang('main.toBasket')</button>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default" role="button">@lang('main.view')</a>
                @csrf
            </form>
            </p>
        </div>
    </div>
    </a>
</div>
