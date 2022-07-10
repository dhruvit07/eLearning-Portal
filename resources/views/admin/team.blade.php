@extends('admin.layouts.app')
@section('title','Team')

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
            <div class="col-md-6">
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
                            <h4 class="card-title">Add Team Member</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('admin.add.member') }}" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required>
                                        <span class="bmd-help">Enter the name of Member!</span>
                                    </div>
                                </div>
                                <label class="col-sm-3 col-form-label">Qualification</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="qualification" class="form-control" required>
                                        <span class="bmd-help">Enter Member Qualification!</span>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Post</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="post" class="form-control" required>
                                        <span class="bmd-help">Enter Member Post!</span>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="controls">
                                        <div class="entry input-group upload-input-group ">
                                            <input class="form-control border " style="background: none; padding:10px"
                                                name="image" type="file" required>
                                            <button class="btn btn-upload bg-white" type="button">
                                            </button>
                                        </div>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">groups</i>
                        </div>
                        <h4 class="card-title">Teams</h4>
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
                                        <th>Name</th>
                                        <th>Qualification</th>
                                        <th>Post</th>
                                        <th width="20%" class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qualification</th>
                                        <th>Post</th>
                                        <th class="text-right">Actions</th>
                                    </tr>


                                </tfoot>
                                <tbody>
                                    @foreach ($team as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->qualifications }}</td>
                                        <td>{{ $member->post }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.delete.member',['id'=>$member->id]) }}"
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