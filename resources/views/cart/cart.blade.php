@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('cart'))
    <div class="jumbotron">
        <div class="row mt-3">
                @foreach(session('cart') as $id => $details)
                <div class="col-lg-6 mt-4">
                        <img src="{{$details['image_url']}}" class="img-fluid rounded" alt="Responsive image">
                </div>
                <div class="col-lg-6 mt-4">
                    <h1 class="display-4">{{$details['name']}}</h1>
                    <hr class="my-4">
                    <p>Rp. {{$details['price']}}</p>
                    <p>Quantity : {{$details['quantity']}}</p>
                    <form action="/updateCart/{{$details['pizza_id']}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-7">
                                <input type="number" class="quantity form-control @error('quantity') is-invalid @enderror" id="inputQuantity" placeholder="Quantity" name="quantity" value="{{$details['quantity']}}" >
                            </div>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if (Auth::check() && Auth::user()->role == 2)
                            <button type="submit" class="btn btn-primary">Update Quantity</button>
                            @endif
                        </div>
                    </form>
                    @if (Auth::check() && Auth::user()->role == 2)
                    <form action="/removeCart/{{$details['pizza_id']}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete Pizza</button>
                    </form>     
                    @endif
                </div>
                @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
    @foreach(session('cart') as $id => $details)
    <form action="/transaction" method="POST">
            @csrf
            <div class="form-group">
            <input type="hidden" class="form-control" id="exampleFormControlInput1" name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div class="form-group">
            <input type="hidden" class="form-control" id="exampleFormControlInput2" name="pizza_id" value="{{$details['pizza_id']}}">
            </div>
            <div class="form-group">
            <input type="hidden" class="form-control" id="exampleFormControlInput3" name="quantity" value="{{$details['quantity']}}">
            </div>  
            <button type="submit" class="btn btn-dark btn-lg">Checkout</button>
    </form>
    @endforeach
    </div>
    @else
    <div style="height: 700px">
        <div class="h-100 w-100 d-inline-block">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-center">Your cart is empty :(</h1>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
