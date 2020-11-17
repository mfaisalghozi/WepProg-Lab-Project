@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="row mt-3">
            <div class="col-lg-6">
                <img src="{{$pizza->image_url}}" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-lg-6">
            <h1 class="display-4">{{$pizza->name}}</h1>
            <hr class="my-4">
            <p>Rp. {{$pizza->price}}</p>
            <p>Quantity : {{$request->qty}}</p>
            <form action="/cart/{{$pizza->id}}">
                <div class="form-group row">
                    <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="inputQuantity" placeholder="Quantity" name="qty">
                    </div>
                    @error('quantity')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @if (Auth::check() && Auth::user()->role == 2)
            <button type="submit" class="btn btn-primary">Upload Quantity</button>
            <a  class="btn btn-danger">Delete from cart</a>
            @endif
            </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a type="button" class="btn btn-dark btn-lg">Checkout</a>
    </div>
</div>
@endsection