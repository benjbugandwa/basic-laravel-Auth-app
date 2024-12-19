@extends('layouts.auth')

@section('title', 'Mot de passe oublié?')

@section('content')
@section('card_title', 'Mot de passe oublié ?')


<div class="small mb-3 text-muted">Entrez votre adresse email ici, un lien vous sera envoyé pour
    réinitialiser votre mot de passe
</div>
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
        <label for="inputEmail">Adresse email </label>
    </div>
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <a class="small" href="{{ route('login') }}">Connexion</a>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
</form>




@endsection
