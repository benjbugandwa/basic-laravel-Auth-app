@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
@section('card_title', 'Connexion')



<form action="{{ route('login.connect') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
        <label for="inputEmail">Votre adresse email</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
        <label for="inputPassword">Votre mot de passe</label>
    </div>

    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <a class="small" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </div>
</form>


@endsection
