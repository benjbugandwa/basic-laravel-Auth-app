@extends('layouts.auth')

@section('title', 'Changer le mot de passe')

@section('content')
@section('card_title', 'Changer le mot de passe')


<form method="POST" action="{{ url('password/update/' . $token) }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">



    <div class="form-floating mb-3">
        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
        <label for="inputPassword">Nouveau mot de passe</label>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
            placeholder="Password" />
        <label for="inputPassword">Confirmer le mot de passe</label>
    </div>

    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>


@endsection
