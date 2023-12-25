@extends('layouts.app')
@section('content')


    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
      <div class="container">
          <div class="about-page-text">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="ap-title">
                          <h2>Welcome To Room Rover.</h2>
                          <p>Built in 2003, this hotel is located in the captial of
                              Philippines, with easy access to the city’s tourist attractions. It offers tastefully
                              decorated rooms.</p>
                      </div>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                      <ul class="ap-services">
                          <li><i class="icon_check"></i> 20% Off On Accommodation.</li>
                          <li><i class="icon_check"></i> Complimentary Daily Breakfast</li>
                          <li><i class="icon_check"></i> 3 Pcs Laundry Per Day</li>
                          <li><i class="icon_check"></i> Free Wifi.</li>
                          <li><i class="icon_check"></i> Discount 20% On Senior Citizen and PWD's</li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="about-page-services">
              <div class="row">
                  <div class="col-md-4">
                      <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p1.jpg') }}">
                          <div class="api-text">
                              <h3>Catering</h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p2.jpg') }}">
                          <div class="api-text">
                              <h3>Travel Plan</h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p3.jpg') }}">
                          <div class="api-text">
                              <h3>Laundry</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- About Us Page Section End -->


@endsection
