@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div class="container">

    @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show p-3 mb-3"
                style="width: 100%; margin:auto; margin-top:5px;" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
    <div class="row p-5">
        <div class="col-md-6 d-flex flex-column align-self-center">
            <h1>Welcome to Jobster</h1>
            <h3>Connect you with friends of the same job</h3>
            @auth
            <a href="#search" class="btn btn-dark">Start Connecting to Friends</a>
            @else
                <a href="/en/register" class="btn btn-dark">Join Us Now</a>
            @endauth
        </div>
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('homepage/Best-Friend-Story.jpg') }}" alt="">
        </div>
    </div>

    <h1 id="search">Search Your Friends Now!</h1>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Gender
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/home?search=male">Male</a></li>
          <li><a class="dropdown-item" href="/home?search=female">Female</a></li>
        </ul>
      </div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Job Interest
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/home?search=Jakarta">Jakarta</a></li>
          <li><a class="dropdown-item" href="/home?search=Tangerang">Tangerang</a></li>
          <li><a class="dropdown-item" href="/home?search=Singapore">Singapore</a></li>
        </ul>
      </div>

      <div class="row">
        @foreach ($users as $user)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'. $user->photo) }}" class="card-img-top" style="height: 14rem" alt="...">
                    <div class="card-ody">
                      <h5 class="card-title">{{ $user->name }}</h5>
                      <p class="card-text">{{ $user->gender }}</p>
                      <form action="/addFriend" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="target_id" value="{{ $user->id }}">
                        <input type="hidden" name="target_name" value="{{ $user->name }}">
                        <button class="btn btn-primary"><img src="{{ asset('homepage/thumb-up.png') }}" alt=""></button>
                      </form>
                    </div>
                  </div>
            </div>

        @endforeach
      </div>


</div>

@endsection
