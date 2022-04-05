@extends('template.default')
@section('title', 'Confirm Order')
@section('content')
        <h1>Confirm order</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Total price: <b>{{$order->getFullPrice()}} Eur</b></p>
                <form action="{{route('basketConfirm')}}" method="POST">
                    <div>
                        <p>Write your name and phone number</p>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone</label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <br><input type="submit" class="btn btn-success" value="Confirm order">
                </form>
            </div>
@endsection
