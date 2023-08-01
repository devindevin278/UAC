@extends('layouts.master')

@section('title', 'Register')

@section('content')

<div class="container p-5">
    <h1 class="fs-2 text-center">Register</h1>
    <form action="/temp" method="post" class="w-50 mx-auto d-flex flex-column" enctype="multipart/form-data">
        @csrf
        <label for="name" class="pt-4">{{ __('form.name') }}</label>
        <input type="text" name="name" id="name" required class="form-control @error('name') invalid @enderror" autofocus value="{{ old('name') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="email" class="pt-2">Email</label>
        <input type="text" name="email" id="email" required class="form-control @error('email') invalid @enderror" value="{{ old('email') }}">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="linkedin" class="pt-2">LinkedIn</label>
        <input type="text" name="linkedin" id="linkedin" required class="form-control @error('linkedin') invalid @enderror" value="{{ old('linkedin') }}">
        @error('linkedin')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="phone" class="pt-2">Phone</label>
        <input type="text" name="phone" id="phone" required class="form-control @error('phone') invalid @enderror" value="{{ old('phone') }}">
        @error('phone')
            <p class="text-danger">{{ $message }}</p>
        @enderror


        <label class="mt-2" for="">Job Interest (Select at least 3)</label>
        <div class="btn-group mb-2" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-dark" for="btncheck1">Education</label>

            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-dark" for="btncheck2">Health Care</label>

            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-dark" for="btncheck3">Transportation</label>

            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-dark" for="btncheck4">Arts</label>
          </div>

        <label for="image" class="pt-2">{{ __('form.photo') }}</label>
            <input type="file" name="photo" id="image" class="form-control @error('photo') invalid @enderror" onchange="previewImage()">
            {{-- <input type="hidden" id="image" name="oldImage" value="{{ $->image }}"> --}}
            <img src="" alt="" class="img-preview img-fluid mb-3 mt col-sm-5 d-block w-100">
            @error('photo')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        <label for="password" class="pt-2">{{ __('form.password') }}</label>
        <input type="password" name="password" id="password" required class="form-control @error('password') invalid @enderror" value="{{ old('password') }}">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="gender" class="pt-2">{{ __('form.gender') }}</label>
        <div class="genderDiv d-flex">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline ms-4">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <label class="mt-4" for="">Registration Fee</label>
        <input class="form-control" type="number" name="fee" readonly value="{{ $rand }}">

        <button type="submit" class="btn btn-primary bg-dark mt-4 mx-auto px-3 border-0 ">Register</button>
        <p class="text-center mt-2">Already have an account? <a href="/en/login">Login</a> now!</p>
    </form>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvenet) {
            imgPreview.src = oFREvenet.target.result;
        }
    }
</script>

@endsection


