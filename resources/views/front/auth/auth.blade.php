@extends("front.layouts.app")

@if (Route::currentRouteName() == 'user.sign.up')
@section('title','Sign Up')
@else
@section('title','Sign In')
@endif


@section('content')

<body>
    <section style="margin-bottom:-3rem;">
        <div class="container {{(Route::currentRouteName() == 'user.sign.up' ? 'active' : '') }}">
            <div class="user signinBx">
                <div class="imgBx"><img src="{{ asset('assets/img/sign-in.jpg') }}" alt="" /></div>
                <div class="formBx">
                    <form action="{{route('user.sign.in.post')}}" method="POST">
                        @csrf
                        @if(session()->has('message'))
                        <h2 style="color: green">
                            {{ session()->get('message') }}
                        </h2>
                        @endif
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <h2 style="color: red"> {{ $error }} </h2>
                        @endforeach
                        @endif
                        <h2>Sign In</h2>
                        <input type="text" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="submit" name="submit" value="Login" />
                        <p class="signup">
                            Don't have an account ?
                            <a href="#" onclick="toggleForm();">Sign Up.</a>
                        </p>

                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form action="{{route('user.sign.up.post')}}" method="POST">
                        @csrf
                        @if(session()->has('message'))
                        <h2 style="color: green">
                            {{ session()->get('message') }}
                        </h2>
                        @endif
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <h2 style="color: red"> {{ $error }} </h2>
                        @endforeach
                        @endif
                        <h2>Create an account</h2>
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Create Password" />
                        <input type="password" name="confirm_password" placeholder="Confirm Password" />
                        <input type="submit" name="submit" value="Sign Up" />
                        <p class="signup">
                            Already have an account ?
                            <a href="#" onclick="toggleForm();">Sign in.</a>
                        </p>
                    </form>
                </div>
                <div class="imgBx"><img src="{{ asset('assets/img/sign-up.jpg') }}" alt="" /></div>
            </div>
        </div>
    </section>
</body>
@endsection