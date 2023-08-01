@extends('layouts.master')

@section('title', 'Notification')

@section('content')

<div class="container">
    @if (count($friends) == 0)
     <div class="p-5 d-flex flex-column justify-content-center">
        <h1 class="text-center fs-2">You have no friend yet</h1>
        <img class="img-fluid w-25 mx-auto" src="{{ asset('homepage/empty-box.png') }}" alt="">
     </div>
    @else

    <div class="row">
        @foreach ($friends as $user)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'. $user->photo) }}" class="card-img-top" style="height: 14rem" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $user->name }}</h5>
                      <p class="card-text">{{ $user->gender }}</p>
                      <a href="/chat" class="btn btn-primary">Chat now</a>
                    </div>
                  </div>
            </div>

        @endforeach
      </div>

    @endif
</div>

@endsection
