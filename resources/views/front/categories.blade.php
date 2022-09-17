@extends('front.layouts.app')

@section('title','Categories')

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
            @foreach ($categories as $category)
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <a href="{{ route('show.category',['id' => $category->id]) }}">
                            <h1 class="mb-3">{{ $category->name }}</h1>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
@endsection