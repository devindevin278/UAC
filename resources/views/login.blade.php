@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="container p-5">

    @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    <h1 class="fs-2 text-center">Login</h1>
    <form action="/login" method="post" class="w-50 mx-auto d-flex flex-column" enctype="multipart/form-data">
        @csrf

        <label for="email" class="pt-2">Email</label>
        <input type="text" name="email" id="email" required class="form-control @error('email') invalid @enderror" value="{{ old('email') }}">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror



        <label for="password" class="pt-2">Password</label>
        <input type="password" name="password" id="password" required class="form-control @error('password') invalid @enderror" value="{{ old('password') }}">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror



        <button type="submit" class="btn btn-primary bg-dark mt-4 mx-auto px-3 border-0 ">Login</button>
        <p class="text-center mt-2">Don't have an account? <a href="/register">Register</a> now!</p>
    </form>
</div>

@endsection


