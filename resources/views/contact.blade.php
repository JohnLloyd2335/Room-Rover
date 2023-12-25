@extends('layouts.app')
@section('content')

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
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
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Your Message"></textarea>
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
