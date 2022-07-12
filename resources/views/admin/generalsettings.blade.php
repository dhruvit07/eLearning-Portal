@extends('admin.layouts.app')
@section('title','General Setting')


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
                            <h4 class="card-title">Update General Settings </h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form id="Validation" method="POST" action="{{ route('admin.update.generalSettings') }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Website Title"
                                            value="{{ $gs->title }}" required>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-4">
                                    <img class="col-sm-12 img-responsive" src="{{ asset('uploads/'.$gs->logo) }}"
                                        alt="">
                                </div>
                                <div class="col-sm-6">
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group ">
                                            <input class="form-control border " style="background: none; padding:10px"
                                                name="logo" type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Favicon</label>
                                <div class="col-sm-4">
                                    <img class="col-sm-12 img-responsive" src="{{ asset('uploads/'.$gs->favicon) }}"
                                        alt="">
                                </div>
                                <div class="col-sm-6">
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group ">
                                            <input class="form-control border " style="background: none; padding:10px"
                                                name="favicon" accept="image/*" type="file">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="email" email="true" name="email" placeholder="Website Email"
                                            class="form-control" value="{{ $gs->email }}" required>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="contact" placeholder="Website Contact"
                                            class="form-control" value="{{ $gs->phone }}" required>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Address"
                                            class="form-control" value="{{ $gs->address }}" required>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Footer</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="footer" rows="3" placeholder="Website Contact"
                                            class="form-control" required>{{ $gs->footer }}</textarea>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="copyright" rows="3" placeholder="Website Contact"
                                            class="form-control" required>{{ $gs->copyright }}</textarea>
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