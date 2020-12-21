@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid text-center text-white" style="background-image: url('https://wallpaperaccess.com/full/866645.jpg');
background-size: cover;
height: 890px;
opacity: 0.8;
filter: brightness(90%);">
    <div class="container">
      <h1 class="display-4" style="font-size: 150px;">PHizza Hut</h1>
      <p class="lead" style="font-size: 50px; font-style: italic">The most advanced pizza service in the world.</p>
    </div>
  </div>
<div class="container">
    {{-- <div class="row justify-content-center">
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
    </div> --}}
    <div class="content mt-3">
        <h1 class="display-4 text-center">Our Frehsly made pizza !</h1>
        <p class="display-5 text-center">order it now!</p>
    
        @if (Auth::check() && Auth::user()->role == 1)
        <a href="/pizza/create" class="btn btn-dark mx-2">Add new pizza</a>
        @endif
        
        @if(Auth::check() || @guest)
            @if (Auth::user()->role == 2 || @guest)
            <nav class="navbar navbar-light bg-light w-100">
                <form class="form-inline w-100 row" action="/pizza/search" method="GET">
                    <div class="col-lg-10 p-0">
                        <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search" name="search">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-outline-success my-2 my-sm-0 w-100" type="submit">Search</button>
                    </div>
                </form>
            </nav>
            @endif
        @else
            <nav class="navbar navbar-light bg-light w-100">
                <form class="form-inline w-100 row" action="/pizza/search" method="GET">
                    <div class="col-lg-10 p-0">
                        <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search" name="search">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-outline-success my-2 my-sm-0 w-100" type="submit">Search</button>
                    </div>
                </form>
            </nav>
        @endif
    </div>
    <div class="row mt-3">
        @foreach($pizza as $p)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <a href="/pizza/{{$p->id}}">
                    <img class="card-img-top" src="{{$p->image_url}}" alt="Card image cap" style="height: 14rem;">
                </a>
                
                <div class="card-body">
                <a class="card-title" href="/pizza/{{$p->id}}" style="text-decoration:none;"><h5 class="text-dark">{{$p->name}}</h5></a>
                  {{-- <h5 class="card-title">{{$p->name}}</h5> --}}
                  <p class="card-text text-muted">Rp. {{$p->price}}</p>
                  @if(Auth::check())
                  @if (Auth::user()->role == 1)
                  <a href="/pizza/{{$p->id}}/edit" class="btn btn-primary">Update Pizza</a>
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