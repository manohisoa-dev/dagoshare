@extends('auth.layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h3>Réinitialiser votre mot de passe</h3>
    <p>Create account to see it in action.</p>

    <form class="m-t form-validation" role="form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" required="">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Envoyer le lien de réinitialisation') }}</button>

        <a  href="{{ route('login') }}">
            <small>{{ __('Se connecter') }}</small>
        </a>

        <p class="text-muted text-center"><small>{{ __('Vous n\'avez pas de compte?') }}</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">{{ __('Créer un compte') }}</a>
    </form>

@endsection
