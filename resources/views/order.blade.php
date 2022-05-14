@extends('template.default')
@section('title', 'Confirm Order')
@section('content')
        <h1>@lang('main.confirm')</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>@lang('main.tot_price'): <b>{{$order->getFullPrice()}} Eur</b></p>
                <form action="{{route('basketConfirm')}}" method="POST" novalidate>
                    <div>
                        <p>@lang('main.confirm_instruction')</p>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('main.u_name')</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                          {{$errors->first('name')}}
                                         </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="email" class="control-label col-lg-offset-3 col-lg-2">@lang('main.u_email')</label>
                                <div class="col-lg-4">
                                    <input type="email" name="email" id="email" value="" class="form-control">
                                    <span class="text-danger">
                                          {{$errors->first('email')}}
                                     </span>
                                </div>
                            </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('main.u_phone')</label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                                @if($errors->has('phone'))
                                    <span class="text-danger">
                                     {{$errors->first('phone')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <br><input type="submit" class="btn btn-success" value="@lang('main.confirm')">
                </form>
            </div>
        </div>
@endsection
