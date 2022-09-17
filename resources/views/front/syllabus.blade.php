@extends('front.layouts.app')

@section('title',$syllabus->name)
@section('style')
<style>
    table{
        width: 80%;
    }
    td {
        border: 2px solid rgb(167, 167, 167);
        padding: 5px 10px;
    }
</style>
@endsection
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
                {!! $syllabus->content !!}
                <?php $i = 1; ?>
                @foreach ($syllabus->files as $file)
                <a href="{{ route('show.syllabus.file',['id'=>$file->id]) }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-primary px-3 m-2">Attachment {{ $i }}</a>
                <?php $i++; ?>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@endsection