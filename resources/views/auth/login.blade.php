@extends('template.default')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{Request::old('email') ?: ''}}">
                @if($errors->has('email'))
                    <span class="text-danger">
                            {{$errors->first('email')}}
                        </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password">
                @if($errors->has('password'))
                    <span class="text-danger">
                            {{$errors->first('password')}}
                        </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
@endsection

