@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="row">
            @foreach($transaction as $t)
            <a class="col-lg-12 mb-2" style="text-decoration:none;" href="/transaction/{{$t->id}}/detail">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{$t->created_at}}</h5>
                      @if(Auth::user()->role == 1)
                      <h6 class="card-subtitle mb-2 text-muted">User ID : {{$t->user->id}}</h6>
                      <p class="card-text">Username : {{$t->user->name}}</p>
                      @endif
                    </div>
                    
                  </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection