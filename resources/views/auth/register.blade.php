@extends('template.default')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{route('register')}}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" value="{{Request::old('name') ?: ''}}">
                    @if($errors->has('name'))
                        <span class="text-danger">
                            {{$errors->first('name')}}
                        </span>
                        @endif
                </div>
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
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
@endsection

