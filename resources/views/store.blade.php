@extends('layouts.master')

@section('title', 'Store')

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
            <h1>Welcome to Store</h1>
            <h3>Buy your Avatar now!</h3>

        </div>

    </div>

    <div class="bg-secondary rounded-5 py-4 mb-5 d-flex flex-column">
        <h5 class="text-center text-white">Wallet</h5>
        <h1 class="text-center text-white">$ {{ auth()->user()->wallet }}</h1>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Top Up Now
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/topup" method="post">
            @csrf
            <div class="modal-body">
                <label for="">Input top up nominal</label>
              <input class="form-control" type="number" name="topup">
              <input type="hidden" name="user_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Top Up</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    </div>

      <div class="row">
        @foreach ($avatars as $avatar)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset( $avatar->image) }}" class="card-img-top" style="height: 14rem" alt="...">
                    <div class="card-ody">
                      <h5 class="card-title">{{ $avatar->name }}</h5>
                      <p class="card-text">${{ $avatar->price }}</p>
                      <form action="/buyAvatar" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                        <input type="hidden" name="avatar_price" value="{{ $avatar->price }}">
                        <button class="btn btn-primary">Buy Now</button>
                      </form>
                    </div>
                  </div>
            </div>

        @endforeach
      </div>


</div>

@endsection
