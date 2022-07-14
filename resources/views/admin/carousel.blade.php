@extends('admin.layouts.app')
@section('title','Carousel')


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
                            <h4 class="card-title">Add Carousel</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form id="Validation" method="POST" action="{{ route('admin.add.carousel') }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Carousel Title" required>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group ">
                                            <input class="form-control border " style="background: none; padding:10px"
                                                name="image" type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="content" rows="3" placeholder="Website Contact"
                                            class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 ml-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">image</i>
                        </div>
                        <h4 class="card-title">Carousels</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th width="60%">Carousel Image</th>
                                        <th width="20%" class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Carousel Image</th>
                                        <th class="text-right">Actions</th>
                                    </tr>


                                </tfoot>
                                <tbody>
                                    @foreach ($carousels as $carousel)
                                    <tr>
                                        <td>{{ $carousel->title }}</td>
                                        <td style="width:60%"><img class="img-responsive" style="width:60%" src="{{ asset('uploads/'. $carousel->image ) }}"></td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.delete.carousel',['id'=>$carousel->id]) }}"
                                                class="btn btn-link btn-danger btn-just-icon remove"><i
                                                    class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection