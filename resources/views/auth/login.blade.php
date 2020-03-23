@extends('portal.read')

@section('portal')

<div class="card col s8">
    <div class="card-header ">{{ __('Login') }}</div>

    <div class="card-body ">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="row">
                <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="">
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <label for="password" class="">{{ __('Senha') }}</label>

                <div class="">
                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                               <label class="form-check-label" for="remember">
                            {{ __('Lembrar-me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row ">
                <div class=" offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

<!--                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>-->
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
