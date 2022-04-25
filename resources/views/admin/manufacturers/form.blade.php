@extends('admin.template.defaultAdmin')
@isset($manufacturer)
    @section('title', 'Manufacturer update: '. $manufacturer->name)
@else
    @section('title', 'Manufacturer creation')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($manufacturer)
            <h1>Manufacturer update: {{$manufacturer->name}}</h1>
        @else
            <h1>Add new manufacturer</h1>
        @endisset
        <hr>
        <form enctype="multipart/form-data" method="POST"
              @isset($manufacturer)
              action="{{route('manufacturers.update', $manufacturer)}}"
              @else
              action="{{route('manufacturers.store')}}"
            @endisset
        >
            <div>
                @isset($manufacturer)
                    @method('PUT')
                @endisset
                @csrf
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($manufacturer){{ $manufacturer->name }}@endisset">
                        @if($errors->has('name'))
                            <span class="text-danger">
                            {{$errors->first('name')}}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection

