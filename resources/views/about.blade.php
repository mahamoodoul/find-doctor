
@extends('layout.app')


@section('title', 'About')

@section('content')






<section style="margin-top: 50px;" class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="img w-100 d-flex align-self-stretch align-items-center" style="background-image:url(images/about.jpg);">
                </div>
            </div>
            <div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                            <h2 class="mb-4">We Are <span>FindDoctor</span> A Healthcare Provider</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p><a href="{{url('/allDoctors')}}" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="{{url('/contact')}}" class="btn btn-secondary py-3 px-4">Contact us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-facts img ftco-counter" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="30">0</strong>
                        <span>Years of Experienced</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="4500">0</strong>
                        <span>Happy Patients</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="84">0</strong>
                        <span>Number of Doctors</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="300">0</strong>
                        <span>Number of Staffs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section img" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Read testimonials</span>
                <h2 class="mb-4">Our Patient Says</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
                            <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                                <p class="name">Jeff Freshman</p>
                                <span class="position">Patients</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
                            <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                                <p class="name">Jeff Freshman</p>
                                <span class="position">Patients</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
                            <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                                <p class="name">Jeff Freshman</p>
                                <span class="position">Patients</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
                            <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                                <p class="name">Jeff Freshman</p>
                                <span class="position">Patients</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4 pb-5 d-flex justify-content-between">
                            <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
                                <p class="name">Jeff Freshman</p>
                                <span class="position">Patients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
