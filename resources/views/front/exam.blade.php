@extends('front.layouts.app')

@section('title',$exam->name)

@section('content')
<!-- BreadCrumbs Start -->
{{ Breadcrumbs::render() }}
<!-- BreadCrumbs End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">@yield('title')</h6>
            {{-- <h2 class="text-center px-3">{{ $exam->name }}</h2> --}}
            <div class="pt-3" style="text-align: left">
                {!! $exam->content !!}
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@endsection