@extends('admin.layouts.app')

@section('title','Login')

@section('content')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black"
        style="background-image: url({{ asset('assets/img/login.jpg') }}); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
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
                    <form class="form" id="form" method="POST" action="{{ route('admin.sign.in.post') }}">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header card-header-rose text-center">
                                <h4 class="card-title">Login</h4>

                            </div>
                            <div class="card-body ">
                                <span class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="Email...">
                                    </div>
                                </span>
                                <span class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password...">
                                    </div>
                                </span>
                            </div>
                            <div class="card-footer justify-content-center">
                                <button class="btn btn-rose btn-link btn-lg" name="submit">Let's Go </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('JS')
<script>
    $(document).ready(function () {
      md.checkFullPageBackgroundImage();
      setTimeout(function () {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
</script>
@endsection