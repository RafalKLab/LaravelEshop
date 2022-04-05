@extends('admin.template.defaultAdmin')
@isset($product)
    @section('title', 'Product update: '. $product->name)
@else
    @section('title', 'Product creation')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Product update: {{$product->name}}</h1>
        @else
            <h1>Add new product</h1>
        @endisset
        <hr>
        <form enctype="multipart/form-data" method="POST"
              @isset($product)
              action="{{route('products.update', $product)}}"
              @else
              action="{{route('products.store')}}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label ">Name: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                        @if($errors->has('name'))
                            <span class="text-danger">
                            {{$errors->first('name')}}
                        </span>
                        @endif
                    </div>
                </div>
                    <br>
                    <div class="row">
                        <label for="category_id" class="col-sm-2 col-form-label ">Category: </label>
                        <div class="col-sm-6">
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    @isset($product)
                                        @if($product->category_id == $category->id)
                                            selected
                                            @endif
                                        @endisset
                                    >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">
                            {{$errors->first('category_id')}}
                        </span>
                            @endif
                        </div>
                    </div>
                    <br>
                <div class="row">
                    <label for="code" class="col-sm-2 col-form-label ">Code: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                        @if($errors->has('code'))
                            <span class="text-danger">
                            {{$errors->first('code')}}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="price" class="col-sm-2 col-form-label">Price: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                        @if($errors->has('price'))
                            <span class="text-danger">
                            {{$errors->first('price')}}
                        </span>
                        @endif
                    </div>
                </div>
                    <br>
                <div class="row">
                     <label for="price" class="col-sm-2 col-form-label">Description: </label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" cols="72" rows="7">@isset($product){{ $product->description }}@endisset</textarea><br>
                            @if($errors->has('description'))
                                <span class="text-danger">
                            {{$errors->first('description')}}
                        </span>
                            @endif
                     </div>
                </div>
                <br>
                <div class="row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-8">
                        <label for="image" class="btn btn-default btn-file">
                            Choose<input type="file" style="display: none;" name="image" id="image">
                        </label>
                        @if($errors->has('image'))
                            <span class="text-danger">
                            {{$errors->first('image')}}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection

