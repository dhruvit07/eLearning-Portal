@extends('front.layouts.app')

@section('title',$page->name)

@section('content')
<!-- BreadCrumbs Start -->
{{ Breadcrumbs::render() }}
<!-- BreadCrumbs End -->
<!-- Service Start -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('uploads/'.$page->image) }}"
                        alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">{{ $page->name }}</h6>
                <h1 class="mb-4">{{ $page->title }}</h1>
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection