@extends('admin.layouts.app')
@section('title','Syllabi')

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
                            <h4 class="card-title">Add Syllabus</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('admin.add.syllabus') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required>
                                        <span class="bmd-help">Enter the name of Syllabus!</span>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select class="selectpicker" data-style="select-with-transition" name="category"
                                            title="Choose Category" data-size="5" required>
                                            {{-- <option disabled> Multiple Options</option> --}}
                                            @foreach ($examTypes as $examType)
                                            <option value="{{ $examType->id  }}">{{ $examType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="content" id="mytextarea" rows="5" class="form-control"
                                            required></textarea>
                                        <span class="bmd-help">Enter the content of Syllabus Page!</span>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Files</label>
                                <div class="col-sm-10">

                                    <div class="controls">
                                        <div class="entry input-group upload-input-group ">
                                            <input class="form-control border " style="background: none; padding:10px"
                                                name="files[]" type="file" required>
                                            <button class="btn btn-upload btn-success btn-add" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">backpack</i>
                </div>
                <h4 class="card-title">Syllabus</h4>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                        width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Files</th>
                                <th width="10%" class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Files</th>
                                <th class="text-right">Actions</th>
                            </tr>


                        </tfoot>
                        <tbody>
                            @foreach ($syllabi as $syllabus)
                            <tr>
                                <td>{{ $syllabus->name }}</td>
                                <td>{!! $syllabus->content !!}</td>
                                <td>{{ $syllabus->examType->name }}</td>
                                <td>
                                    @foreach ($syllabus->files as $file)
                                    <a target="_blank" href="{{ route('show.syllabus.file',['id'=>$file->id]) }}">{{
                                        $file->name }}</a>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.delete.syllabus',['id'=>$syllabus->id]) }}"
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

@section('JS')
<script>
    $(function () {
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });



</script>

@endsection