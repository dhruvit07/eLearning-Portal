@extends("front.layouts.app")

@section('title','Password Reset')



@section('content')

<body>
    <section style="margin-bottom:-3rem;">
        <div class="container" style="width: 500px; height: 300px;">
            <div class="user" style="width: 100%">
                <div class="formBx" style="width: 100%;">
                    <form action="{{ route('password.email') }}" method="POST">
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
                        <h2>Enter Your Email</h2>
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="submit" style="max-width:none;" name="submit" value="Send Reset Password link!" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection