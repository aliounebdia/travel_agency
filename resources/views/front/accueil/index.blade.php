@extends('front.layout.default')

@section('content')


@include('front.accueil.apropos')

@include('front.accueil.services')

@include('front.accueil.destinations')


{{--<!-- Package Start -->--}}
{{--<div class="container-xxl py-5">--}}
    {{--<div class="container">--}}
        {{--<div class="text-center wow fadeInUp" data-wow-delay="0.1s">--}}
            {{--<h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>--}}
            {{--<h1 class="mb-5">Awesome Packages</h1>--}}
        {{--</div>--}}
        {{--<div class="row g-4 justify-content-center">--}}
            {{--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">--}}
                {{--<div class="package-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/package-1.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="d-flex border-bottom">--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Thailand</small>--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>--}}
                        {{--<small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2 Person</small>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h3 class="mb-0">$149.00</h3>--}}
                        {{--<div class="mb-3">--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                        {{--</div>--}}
                        {{--<p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>--}}
                        {{--<div class="d-flex justify-content-center mb-2">--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">--}}
                {{--<div class="package-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/package-2.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="d-flex border-bottom">--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Indonesia</small>--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>--}}
                        {{--<small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2 Person</small>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h3 class="mb-0">$139.00</h3>--}}
                        {{--<div class="mb-3">--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                        {{--</div>--}}
                        {{--<p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>--}}
                        {{--<div class="d-flex justify-content-center mb-2">--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">--}}
                {{--<div class="package-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/package-3.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="d-flex border-bottom">--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Malaysia</small>--}}
                        {{--<small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 days</small>--}}
                        {{--<small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2 Person</small>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h3 class="mb-0">$189.00</h3>--}}
                        {{--<div class="mb-3">--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                            {{--<small class="fa fa-star text-primary"></small>--}}
                        {{--</div>--}}
                        {{--<p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam eos</p>--}}
                        {{--<div class="d-flex justify-content-center mb-2">--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>--}}
                            {{--<a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Package End -->--}}


@include('front.accueil.reservation')


{{--@include('front.accueil.processes')--}}


{{--<!-- Team Start -->--}}
{{--<div class="container-xxl py-5">--}}
    {{--<div class="container">--}}
        {{--<div class="text-center wow fadeInUp" data-wow-delay="0.1s">--}}
            {{--<h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>--}}
            {{--<h1 class="mb-5">Meet Our Guide</h1>--}}
        {{--</div>--}}
        {{--<div class="row g-4">--}}
            {{--<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">--}}
                {{--<div class="team-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/team-1.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h5 class="mb-0">Full Name</h5>--}}
                        {{--<small>Designation</small>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">--}}
                {{--<div class="team-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/team-2.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h5 class="mb-0">Full Name</h5>--}}
                        {{--<small>Designation</small>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">--}}
                {{--<div class="team-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/team-3.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h5 class="mb-0">Full Name</h5>--}}
                        {{--<small>Designation</small>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">--}}
                {{--<div class="team-item">--}}
                    {{--<div class="overflow-hidden">--}}
                        {{--<img class="img-fluid" src="{{ asset('theme/img/team-4.jpg') }}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>--}}
                        {{--<a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="text-center p-4">--}}
                        {{--<h5 class="mb-0">Full Name</h5>--}}
                        {{--<small>Designation</small>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Team End -->--}}


{{--<!-- Testimonial Start -->--}}
{{--<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">--}}
    {{--<div class="container">--}}
        {{--<div class="text-center">--}}
            {{--<h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>--}}
            {{--<h1 class="mb-5">Our Clients Say!!!</h1>--}}
        {{--</div>--}}
        {{--<div class="owl-carousel testimonial-carousel position-relative">--}}
            {{--<div class="testimonial-item bg-white text-center border p-4">--}}
                {{--<img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('theme/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">--}}
                {{--<h5 class="mb-0">John Doe</h5>--}}
                {{--<p>New York, USA</p>--}}
                {{--<p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
            {{--</div>--}}
            {{--<div class="testimonial-item bg-white text-center border p-4">--}}
                {{--<img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('theme/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">--}}
                {{--<h5 class="mb-0">John Doe</h5>--}}
                {{--<p>New York, USA</p>--}}
                {{--<p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
            {{--</div>--}}
            {{--<div class="testimonial-item bg-white text-center border p-4">--}}
                {{--<img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('theme/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">--}}
                {{--<h5 class="mb-0">John Doe</h5>--}}
                {{--<p>New York, USA</p>--}}
                {{--<p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
            {{--</div>--}}
            {{--<div class="testimonial-item bg-white text-center border p-4">--}}
                {{--<img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('theme/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">--}}
                {{--<h5 class="mb-0">John Doe</h5>--}}
                {{--<p>New York, USA</p>--}}
                {{--<p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Testimonial End -->--}}

@endsection