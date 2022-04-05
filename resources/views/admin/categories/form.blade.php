@extends('admin.template.defaultAdmin')
@isset($category)
    @section('title', 'Category update: '. $category->name)
@else
    @section('title', 'Category creation')
@endisset

@section('content')
   <div class="col-md-12">
       @isset($category)
           <h1>Category update: {{$category->name}}</h1>
       @else
           <h1>Add new category</h1>
       @endisset
       <hr>
       <form enctype="multipart/form-data" method="POST"
             @isset($category)
              action="{{route('categories.update', $category)}}"
             @else
               action="{{route('categories.store')}}"
             @endisset
       >
           <div>
               @isset($category)
                   @method('PUT')
               @endisset
               @csrf
               <div class="row">
                   <label for="code" class="col-sm-2 col-form-label ">Code: </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="code" id="code"
                              value="@isset($category){{ $category->code }}@endisset">
                       @if($errors->has('code'))
                           <span class="text-danger">
                            {{$errors->first('code')}}
                        </span>
                       @endif
                   </div>
               </div>
               <br>
               <div class="row">
                   <label for="name" class="col-sm-2 col-form-label">Name: </label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="name" id="name"
                              value="@isset($category){{ $category->name }}@endisset">
                       @if($errors->has('name'))
                           <span class="text-danger">
                            {{$errors->first('name')}}
                        </span>
                       @endif
                   </div>
               </div>
               <br>
               <div class="row">
                   <label for="description" class="col-sm-2 col-form-label">Description: </label>
                   <div class="col-sm-6">
                       <textarea name="description" id="description" cols="72" rows="7">@isset($category){{ $category->description }}@endisset</textarea><br>
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

