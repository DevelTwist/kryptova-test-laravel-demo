@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row justify-content-center">

        @auth
            <div>

                <h1> Welcome {{ auth()->user()->name }} </h1>
                <h2> Your email: {{ auth()->user()->email }}</h2>
                
                @if (auth()->user()->role == 'admin')
                    <span> Role: {{ auth()->user()->role }}. Are you ready to start today? </span>
                @elseif (auth()->user()->role == 'manager')
                    <span> Role: {{ auth()->user()->role }}. How's your day? </span>
                @endif


                <div>
                    <a href="{{ route('show.student') }}" class="text-sm text-gray-700 underline">Students</a>
                    <br>
                    <a href="{{ route('auth.logout') }}" class="text-sm text-gray-700 underline">Log out</a>
                    <br>
                </div>

            </div>
        @endauth

        @guest
            <div class="col-md-12">
                <div class="">
                    <div class="card-header"><h1>{{ __('Login') }}</h1></div>

                    <div class="card-body">
                        <form action="{{route('auth.login')}}" class="container-center" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    @if($errors->any())
                       {{ $errors->first() }}
                    @endif
                
                    <div>
                        <a href="{{ url('/register') }}" class="text-sm text-gray-700 underline">Register</a>
                        <br>
                    </div>
                
                </div>


            </div>
        @endguest



    </div>
</div>

@endsection

