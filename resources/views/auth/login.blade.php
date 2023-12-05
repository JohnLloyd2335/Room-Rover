@extends('layouts.app')

@section('content')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Room Rover</h1>
                    <p>Find Your Perfect Space – Roam, Relax, and Reserve with Room Rover.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">

              

                <div class="booking-form">
                    
                    <h3 class="text-center">Login</h3>
                    @if (session('error'))
                        <script>
                            alert("Access Denied");
                        </script>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="select-option">
                            <label for="room">Email:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="check-date">
                            <label for="date-in">Password:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                       <div class="d-flex px-4 justify-content-between">
                        <div>
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="">Remember me</label>
                        </div> 
                        <a href="{{ route('password.request') }}" class="text-dark ml-2">Forgot Password?</a>
                       </div>
                        
                        <button type="submit">Login</button>
                        
                        <div class="d-flex flex-column align-items-center justify-content-center gap-1 my-2">
                            <a href="{{ route('register') }}" class="text-dark">Don't have an account?</a>
                            
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
