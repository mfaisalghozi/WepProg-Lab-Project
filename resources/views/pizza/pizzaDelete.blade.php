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
            <p class="lead">{{$pizza->description}}</p>
            <hr class="my-4">
            <p>Rp. {{$pizza->price}}</p>
            @if (Auth::check() && Auth::user()->role == 1)
            <form method="POST" action="/pizza/{{$pizza->id}}">
                @method('delete')
                @csrf
                <div class="form-group row">
                    <button class="col-sm-3 btn btn-danger" type="submit">Delete Pizza</button>
                </div>
            </form>
            @endif

            </div>
        </div>
    </div>
    
</div>
@endsection