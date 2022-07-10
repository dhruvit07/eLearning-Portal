@extends('front.layouts.app')

@section('title',$category->name)

@section('content')
<!-- BreadCrumbs Start -->
{{ Breadcrumbs::render() }}
<!-- BreadCrumbs End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">@yield('title')</h6>
        </div>
        <div class="row g-4">
            @if ($syllabi->isEmpty())
            <img src="{{ asset('assets/img/not-found.webp') }}" alt="Not Found" class="pt-3">
            @endif
            @foreach ($syllabi as $syllabus)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h1 class="mb-3">{{ $syllabus->name }}</h1>
                        <a href="{{ route('show.syllabus',['id'=>$syllabus->id]) }}" class="btn btn-primary">See
                            Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
@endsection