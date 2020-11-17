@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="row">
            @foreach($user as $u)
            <div class="col-lg-4">
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">User ID : {{$u->id}}</h5>
                    <p class="card-text">Name : {{$u->name}}</p>
                    <p class="card-text">Email : {{$u->email}}</p>
                    <p class="card-text">Address : {{$u->address}}</p>
                    <p class="card-text">Phone Number : {{$u->phoneNumber}}</p>
                    <p class="card-text">Gender : {{$u->gender}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection