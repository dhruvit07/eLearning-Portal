@extends('front.layouts.app')

@section('title','Home')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        @foreach ($carousels as $carousel)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('uploads/'.$carousel->image) }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56,.3);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h2 class="display-4 text-primary animated slideInDown">{{ $carousel->title }}</h2>
                            <div class="fs-5 text-white mb-4 pb-2">{!! $carousel->content !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Why you Should Choose Us</h6>
            <h1 class="mb-5">Why Us</h1>
        </div>
        <div class="container">
            <div class="row g-4">
                @foreach ($cards as $card)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <?php $i = rand(0,3)?>
                            {!! $icons[$i] !!}
                            <h5 class="mb-3">{{ $card->title }}</h5>
                            {!! $card->content !!}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('uploads/'.$about->image) }}"
                        alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">{{ $about->title }}</h1>
                Brahmastra Academy is a new generation organization primarily aimed to offer solutions across multiple levels in EDUCATION. Brahmastra Academy was incorporated to impart quality education to students preparing for various board & competitive examinations. Enabled with rich leadership the Company is born with the vision of setting new benchmarks in the field of education.

            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Categories Start -->
@if ($cats->count() > 3)
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
            <h1 class="mb-5">Syllabus Categories</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden"
                            href="{{ route('show.category',['id'=>$cats[0]['id']]) }}">
                            <img class="img-fluid" src="{{ asset('assets/img/cat-1.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                style="margin: 1px;">
                                <h5 class="m-0">{{ $cats[0]['name'] }}</h5>
                                <small class="text-primary"> {{ $cats[0]->syllabus->count() }} Syllabi</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden"
                            href="{{ route('show.category',['id'=>$cats[2]['id']]) }}">
                            <img class="img-fluid" src="{{ asset('assets/img/cat-2.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                style="margin: 1px;">
                                <h5 class="m-0">{{ $cats[1]['name'] }}</h5>
                                <small class="text-primary"> {{ $cats[1]->syllabus->count() }} Syllabi</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden"
                            href="{{ route('show.category',['id'=>$cats[3]['id']]) }}">
                            <img class="img-fluid" src="{{ asset('assets/img/cat-3.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                style="margin: 1px;">
                                <h5 class="m-0">{{ $cats[2]['name'] }}</h5>
                                <small class="text-primary"> {{ $cats[2]->syllabus->count() }} Syllabi</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden"
                    href="{{ route('show.category',['id'=>$cats[0]['id']]) }}">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assets/img/cat-4.jpg') }}"
                        alt="" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                        <h5 class="m-0">{{ $cats[3]['name'] }}</h5>
                        <small class="text-primary"> {{ $cats[3]->syllabus->count() }} Syllabi</small>
                    </div>
                </a>
            </div>
        </div>
        @endif

    </div>
</div>
<!-- Categories Start -->





<!-- Team Start -->
@if (!$team->isEmpty())
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
            <h1 class="mb-5">Expert Instructors</h1>
        </div>
        <div class="row g-4">
            @foreach ($team as $member)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" style="height:300px;width:100%;object-fit:cover;"
                            src="{{ asset('uploads/'.$member->image) }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">{{ $member->name }}({{$member->qualifications }})</h5>
                        <small>{{ $member->post }}</small>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif
<!-- Team End -->


{{--
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End --> --}}

@endsection