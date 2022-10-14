@extends('layouts.dashboard')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <i class="fab fa-laravel text-primary"></i>
                    @if (\Session::has('registered'))
                        <div class="alert alert-success">
                            <ul>
                                    <li>{!! \Session::get('registered') !!}</li>
                                </ul>
                            </div>
                        @endif
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ __('Login') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror "
                                       name="email" value="{{ old('email') }}" tabindex="1" required autofocus autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">{{ __('Password') }}</label>
                                    @if (Route::has('password.request'))
                                        <div class="float-right">
                                            <a href="{{ route('password.request') }}" class="text-small">{{ __('Forgot Your Password?') }}</a>
                                        </div>
                                    @endif
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" tabindex="2" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                             {{-- Login with Facebook --}}
                                <div class="flex items-center justify-end mt-4">
                                    <a class="btn" href="{{ url('auth/facebook') }}"
                                        style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                                        Login with Facebook
                                    </a>
                                </div>

                                 <div class="flex items-center justify-end mt-4">
                                    <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="{{ url('auth/google') }}"
                                        ><img src="https://img.icons8.com/color/16/000000/google-logo.png">
                                        Log in Using Google
                                    </a>
                                </div>

                                @if(Route::has('register'))
                                <div class="form-divider"></div>
                                <div class="form-group">
                                    <a class="btn btn-info" href="{{ route('register') }}">Register</a>
                                    @if(Route::has('oauthLogin'))
                                        <a class="btn btn-dark ml-2" href="{{ route('oauthLogin', ['provider' => 'github']) }}"><i class="fab fa-github"></i></a>
                                    @endif
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} - <span class="text-primary font-weight-bold">{{ env('APP_NAME') }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerScripts')
    @if(!empty($errors->all()))
        <script type="text/javascript">
            @foreach($errors->all() as $error)
                iziToast.error({
                    title: '{{ __('Error') }}',
                    message: '{{ $error }}',
                    position: 'bottomCenter'
                });
            @endforeach
        </script>
    @endif
@endsection
