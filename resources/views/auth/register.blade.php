@extends('auth.layouts.app')

@section('content')
    <h3>S'inscrire dans DS</h3>
    <p>Create account to see it in action.</p>
    <form class="m-t form-validation" role="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Nom" name="nom" value="{{ old('nom') }}" required autofocus>
            @if ($errors->has('nom'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nom') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="{{ old('prenom') }}" required>
            @if ($errors->has('prenom'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('prenom') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmation du mot de passe" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">S'inscrire</button>

        <p class="text-muted text-center"><small>Vous avez déjà un compte?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Se connecter</a>
    </form>
@endsection
