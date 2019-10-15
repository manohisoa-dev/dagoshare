@extends('auth.layouts.app')

@section('content')

    <h3>Bienvenue à Dago-share</h3>
    <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
        <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
    </p>
    <p>Connectez-vous. Pour le voir en action.</p>
    <form class="m-t form-validation" role="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" required="">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Password" required="">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary block full-width m-b">{{ __('S\'identifier') }}</button>

        @if (Route::has('password.request'))
            <a  href="{{ route('password.request') }}">
                <small>{{ __('Mot de passe oublié?') }}</small>
            </a>
        @endif
        <p class="text-muted text-center"><small>{{ __('Vous n\'avez pas de compte?') }}</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">{{ __('Créer un compte') }}</a>
    </form>
@endsection
