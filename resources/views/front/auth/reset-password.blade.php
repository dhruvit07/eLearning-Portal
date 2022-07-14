@extends("front.layouts.app")

@section('title','Password Reset')



@section('content')

<body>
    <section style="margin-bottom:-3rem;">
        <div class="container" style="width: 500px; height: 300px;">
            <div class="user" style="width: 100%">
                <div class="formBx" style="width: 100%;">
                    <form action="{{ route('password.update') }}" method="POST">
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
                        <h2>Enter New Password</h2>
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <input type="email" name="email" value="{{ $email }}" readonly placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Create New Password" />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        <input type="submit" style="max-width:none;" name="submit" value="Reset Password!" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection