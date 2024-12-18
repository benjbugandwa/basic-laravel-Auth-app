@extends('layouts.auth')

@section('title', 'Mot de passe oublié?')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Mot de passe oublié ?</h3>
                    </div>
                    <div class="card-body">
                        <div class="small mb-3 text-muted">Entrez votre adresse email ici, un lien vous sera envoyé pour
                            réinitialiser votre mot de passe</div>
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="name@example.com" />
                                <label for="inputEmail">Adresse email </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="login.html">Connexion</a>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="register.html">Créer un compte ici!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
