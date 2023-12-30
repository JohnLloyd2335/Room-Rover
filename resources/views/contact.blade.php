@extends('layouts.app')
@section('content')

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">

            @if (session('error'))
                <div class="my-2">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="my-2">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p style="text-align: justify; text-justify: inter-word;">Room Rover ensures your perfect hotel stay
                            at your fingertips. Explore curated options, seamlessly reserve your preferred room, and
                            experience personalized hospitality with our intuitive app. Your journey begins with Room Rover,
                            where comfort meets convenience.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Manila, Philippines</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>09123456789</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>roomrover@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="row my-2">
                        <div class="col-12">
                            <h3 class="text-center">Send us an Email</h3>
                        </div>
                    </div>
                    <form action="{{ route('contact.send') }}" class="contact-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Name" name="name" autocomplete="off" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Your Email" name="email" autocomplete="off" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Your Message" name="message">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <iframe
                    src="https://maps.google.com/maps?q=Manila%20Philippines&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    height="470" style="border:0;" allowfullscreen=""></iframe>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
