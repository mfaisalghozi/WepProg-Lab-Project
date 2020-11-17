@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="row mt-3">
            <div class="col-lg-6">
                <img src="{{$transaction->pizza->image_url}}" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-lg-6">
            <h1 class="display-4">{{$transaction->pizza->name}}</h1>
            <p class="lead">Price : {{$transaction->pizza->price}}</p>
            <p class="lead">Quantity : {{$transaction->quantity}}</p>
            <hr class="my-4">
            <p>Total Price : Rp. {{$transaction->total_price}}</p>
            </div>
        </div>
    </div>
    
</div>
@endsection