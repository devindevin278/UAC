@extends('layouts.master')

@section('title', 'Notification')

@section('content')

<div class="container">
    @if (count($requesters) == 0)
     <div class="p-5 d-flex flex-column justify-content-center">
        <h1 class="text-center fs-2">You have no incoming friend request</h1>
        <img class="img-fluid w-25 mx-auto" src="{{ asset('homepage/empty-box.png') }}" alt="">
     </div>
    @else

    <div class="row">
        @foreach ($requesters as $user)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'. $user->user->photo) }}" class="card-img-top" style="height: 14rem" alt="...">
                    <div class="card-ody">
                      <h5 class="card-title">{{ $user->user->name }}</h5>
                      <p class="card-text">{{ $user->user->gender }}</p>
                      <form action="/addMatch" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="target_id" value="{{ $user->user->id }}">
                        <input type="hidden" name="target_name" value="{{ $user->user->name }}">
                        <button class="btn btn-primary">Accept</button>
                    </form>
                    </div>
                  </div>
            </div>

        @endforeach
      </div>

    @endif
</div>

@endsection
