@extends('layouts.auth')

@section('css')

    <style>
        .invalid-feedback {
            display: block
        }
    </style>
@endsection

@section('content')


    <p class="login-box-msg text-capitalize">Sign up here</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <div class="input-group">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                       name="first_name"  placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group ">
            <div class="input-group">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                       name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group ">
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" placeholder="Enter Password" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Your Password" name="password_confirmation" required
                       autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

            </div>

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>

    </form>

    {{--<p class="mb-1">--}}
    {{--<a href="{{ route('password.request') }}">I forgot my password</a>--}}
    {{--</p>--}}
    <p class="mb-0 offset-2">
        <a href="{{ route('login')}}" class="text-center">Already Have An Accounts Sign-In</a>
    </p>





    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">{{ __('Register') }}</div>--}}

    {{--<div class="card-body">--}}
    {{----}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
