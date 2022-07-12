@extends('admin.layouts.app')
@section('title',$page->name)


@section('style')
<style>
    .btn-upload {
        padding: 10px 20px;
        margin-left: 10px;
    }

    .upload-input-group {
        margin-bottom: 10px;
    }

    .input-group>.custom-select:not(:last-child),
    .input-group>.form-control:not(:last-child) {
        height: 45px;
    }
</style>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mb-5">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span class="text-center">
                        <b>{{ $error }} </b></span>
                </div>
                @endforeach

                @endif
                @if(session()->has('message'))
                <div class="alert alert-success mb-5">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span class="text-center">
                        <b>{{ session()->get('message') }} </b></span>
                </div>
                @endif
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Update {{ $page->name }} </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        @if (Request::routeIs('admin.mission'))
                        <form id="Validation" method="POST" action="{{ route('admin.update.mission') }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @else
                            <form id="Validation" method="POST" action="{{ route('admin.update.about') }}"
                                class="form-horizontal" enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="name" value="{{ $page->name }}">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Page Title" value="{{ $page->title }}" required>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-4">
                                        <img class="col-sm-12 img-responsive" src="{{ asset('uploads/'.$page->image) }}"
                                            alt="">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="controls">
                                            <div class="entry input-group upload-input-group ">
                                                <input class="form-control border "
                                                    style="background: none; padding:10px" name="image" type="file"
                                                    accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Content</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <textarea name="content" rows="3" placeholder="Website Contact"
                                                class="form-control" required>{{ $page->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 ml-auto">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill btn-rose">Update</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection