@extends('layouts.auth')

@section('title', 'Créer un compte')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Créer un compte</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf


                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ old('name') }}" placeholder="name@example.com" />
                                <label for="inputEmail">Nom complet</label>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email"
                                    value="{{ old('email') }}" placeholder="name@example.com" />
                                <label for="inputEmail">Adresse email</label>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Create a password" />
                                        <label for="inputPassword">Mot de passe</label>
                                    </div>
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password_confirmation" name="password_confirmation"
                                            type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirmer le mot de passe</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">Créer un
                                        compte</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('login') }}">Cliquez ici pour vous connecter si vous avez déjà
                                un
                                compte</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
