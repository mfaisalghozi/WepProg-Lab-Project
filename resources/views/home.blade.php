@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <h1 class="display-4">Our Frehsly made pizza !</h1>
        <p class="display-5">order it now!</p>
        @if(Auth::check())
        @if (Auth::user()->role == 1)
        <a href="/pizza/create" class="btn btn-dark mx-2">Add new pizza</a>
        @endif
        @endif
        <nav class="navbar navbar-light bg-light mr-0 w-100">
            <form class="form-inline w-100">
              <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
    </div>
    <div class="row mt-3">
        @foreach($pizza as $p)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <a href="/pizza/{{$p->id}}">
                    <img class="card-img-top" src="{{$p->image_url}}" alt="Card image cap">
                </a>
                
                <div class="card-body">
                <a class="card-title" href="/pizza/{{$p->id}}" style="text-decoration:none;"><h5 class="text-dark">{{$p->name}}</h5></a>
                  {{-- <h5 class="card-title">{{$p->name}}</h5> --}}
                  <p class="card-text text-muted">Rp. {{$p->price}}</p>
                  @if(Auth::check())
                  @if (Auth::user()->role == 1)
                  <a href="#" class="btn btn-primary">Update Pizza</a>
                  <a href="/pizza/{{$p->id}}/delete" class="btn btn-danger ml-2">Delete Pizza</a>
                  @endif
                  @endif
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
