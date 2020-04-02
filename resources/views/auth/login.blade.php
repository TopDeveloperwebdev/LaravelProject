@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-1">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img style="margin-bottom:100px;" width="100%" src="https://relib.org.uk/wp-content/themes/relib/images/logo.png" />
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" size="20" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Login') }}
                                </button>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-12">


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lost Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
