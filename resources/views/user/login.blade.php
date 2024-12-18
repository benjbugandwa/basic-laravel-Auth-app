@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Connexion</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.connect') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="name@example.com" />
                                <label for="inputEmail">Votre adresse email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password"
                                    placeholder="Password" />
                                <label for="inputPassword">Votre mot de passe</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                <button type="submit" class="btn btn-primary">Connexion</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="register.html">Créer un compte</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
