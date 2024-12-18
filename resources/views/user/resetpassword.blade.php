@extends('layouts.auth')

@section('title', 'Changer le mot de passe')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Définir un nouveau mot de passe</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                                    value="{{ $email ?? old('email') }}" readonly />
                                <label for="inputPassword">Adresse email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password"
                                    placeholder="Password" />
                                <label for="inputPassword">Nouveau mot de passe</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="password_confirmation" name="password_confirmation"
                                    type="password" placeholder="Password" />
                                <label for="inputPassword">Confirmer le mot de passe</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
