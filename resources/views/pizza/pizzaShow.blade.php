@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center" style="height: 800px">
    <div class="jumbotron">
        <div class="row mt-3">
            <div class="col-lg-6">
                <img src="{{$pizza->image_url}}" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-lg-6">
            <h1 class="display-4">{{$pizza->name}}</h1>
            <p class="lead">{{$pizza->description}}</p>
            <hr class="my-4">
            <p>Rp. {{$pizza->price}}</p>
            @if (Auth::check() && Auth::user()->role == 2)
            <form method="GET" action="/addToCart/{{$pizza->id}}">
                <div class="form-group row">
                    <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputQuantity" placeholder="Quantity" name="qty">
                    </div>
                    <button class="col-sm-3 btn btn-primary" type="submit">add to cart</button>
                </div>
            </form>
            @endif
            </div>
        </div>
    </div>
    
</div>
@endsection