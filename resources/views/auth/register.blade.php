@extends('layouts.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="hero-text">
                        <h1>Room Rover</h1>
                        <p>Find Your Perfect Space – Roam, Relax, and Reserve with Room Rover.</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3 class="text-center">Register</h3>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="select-option">
                                <label for="room">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="select-option">
                                <label for="room">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="select-option">
                                <label for="room">Address:</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}">
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="select-option">
                                <label for="room">Mobile Number:</label>
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                    name="mobile_number" value="{{ old('mobile_number') }}">
                                @error('mobile_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="select-option">
                                <label for="room">Date of Birth:</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="select-option">
                                <label for="room">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option @selected(old('gender') == 'Male') value="Male">Male</option>
                                    <option @selected(old('gender') == 'Female') value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="select-option">
                                <label for="date-in">Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" >
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="select-option">
                                <label for="date-in">Confirm Password:</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" >
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <button type="submit">Register</button>

                            <div class="d-flex flex-column align-items-center justify-content-center gap-1 my-2">
                                <a href="login.html" class="text-dark">Already have an Account?</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-3.jpg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->
@endsection
