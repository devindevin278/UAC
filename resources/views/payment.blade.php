@extends('layouts.master')

@section('title', 'Payment')

@section('content')

    <div class="container">

        @if (session()->has('fail'))
            <div class="alert alert-danger alert-dismissible fade show p-3 mb-3" style="width: 100%; margin:auto; margin-top:5px;" role="alert">
                {{ session('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1>Payment</h1>
        <h2 class="fs-4">Finish your payment now and connect to new friend</h2>

        <h2 class="fs-4 text-secondary">Amount due: ${{ session()->get('user_data')['fee'] }}</h2>


        <form action="/register" class="d-flex flex-column" method="post">
            @csrf
            <label for="nominal">Input your nominal</label>
            <input type="number" class="form-control" name="money">
            <input type="hidden" name="temp_email" value="{{ session()->get('user_data')['email'] }}">
            <input type="hidden" name="fee" value="{{ session()->get('user_data')['fee'] }}">
            <button class="btn btn-dark my-5 mx-auto">Make payment</button>
        </form>
    </div>

@endsection
