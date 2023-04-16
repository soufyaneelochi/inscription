@extends('layouts.app')

@section('content')
@php
use App\Models\Maroc;
$cities= Maroc::all();
@endphp
<style>
    .form {
    background-color: white;
    padding: 3.125em;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 5px 5px 15px -1px rgba(0,0,0,0.75);
    }

    .signup {
    color: rgb(77, 75, 75);
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    font-weight: bold;
    font-size: x-large;
    margin-bottom: 0.5em;
    }

    label {
    color: rgb(77, 75, 75);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    align-self: start;
    display: block;
    font-weight: bold;
    margin-bottom: 0.5em;
    }

    .form--input {
    width: 100%;
    margin-bottom: 1.25em;
    height: 40px;
    border-radius: 5px;
    border: 1px solid gray;
    padding: 0.8em;
    font-family: 'Inter', sans-serif;
    outline: none;
    }

    .form--input:focus {
    border: 1px solid #639;
    outline: none;
    }

    .form--marketing {
    display: flex;
    margin-bottom: 1.25em;
    align-items: start;
    }

    .form--marketing > input {
    margin-right: 0.625em;
    }

    .form--marketing > label {
    color: grey;
    }

    .checkbox, input[type="radio"] {
    accent-color: #639;
    }

    .form--submit {
    width: 50%;
    padding: 0.625em;
    border-radius: 5px;
    color: white;
    background-color: #639;
    border: 1px dashed #639;
    cursor: pointer;
    }

    .form--submit:hover {
    color: #639;
    background-color: white;
    border: 1px dashed #639;
    cursor: pointer;
    transition: 0.5s;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="signup">SIGN UP</span>
                    <label for="nom">{{ __('Nom :') }}</label>
                    <input placeholder="Nom" id="nom" type="text" class="form--input @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="prenom">{{ __('Prenom :') }}</label>
                    <input placeholder="Prenom" id="prenom" type="text" class="form--input @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">{{ __('Email :') }}</label>
                    <input placeholder="Email" id="email" type="email" class="form--input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">{{ __('Password :') }}</label>
                    <input type="password" placeholder="Password" id="password" class="form--input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form--input" name="password_confirmation" required autocomplete="new-password">
                    
                    <label for="codemassar">{{ __('code massar :') }}</label>
                    <input placeholder="Code massar" id="codemassar" type="text" class="form--input @error('codemassar') is-invalid @enderror" name="codemassar" value="{{ old('codemassar') }}" required autocomplete="codemassar" >
                    @error('codemassar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="cin">{{ __('cin :') }}</label>
                    <input placeholder="CIN" id="cin" type="text" class="form--input @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" >
                    @error('cin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="datenaissance">{{ __('date de naissance :') }}</label>
                    <input id="datenaissance" type="date" class="form--input @error('datenaissance') is-invalid @enderror" name="datenaissance" value="{{ old('datenaissance') }}" required autocomplete="datenaissance" >
                    @error('datenaissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="lieunaissance1">{{ __('lieu de naissance :') }}</label>
                    <input list="lieunaissance1" placeholder="Lieu de naissance" id="lieunaissance" name="lieunaissance" class="form--input @error('lieunaissance') is-invalid @enderror" name="lieunaissance" value="{{ old('lieunaissance') }}" required autocomplete="lieunaissance">
                    <datalist id="lieunaissance1">
                        @foreach($cities as $city)
                            <option value="{{ $city->city }}" >
                        @endforeach
                    </datalist>
                    @error('lieunaissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="ville1">{{ __('ville :') }}</label>
                    <input list="ville1" placeholder="Ville" id="ville" name="ville" class="form--input @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">
                    <datalist id="ville1">
                        @foreach($cities as $city)
                            <option value="{{ $city->city }}" >
                        @endforeach
                    </datalist>
                    @error('ville')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="Adresse">{{ __('Adresse :') }}</label>
                    <input placeholder="Adresse" id="adresse" type="text" class="form--input @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" >
                    @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="telephone">{{ __('Numero de téléphone :') }}</label>
                    <input placeholder="Numero de téléphone" id="telephone" type="text" class="form--input @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" >
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="sexe">{{ __('sexe :') }}</label>
                    <div class="form--marketing ">
                        <input id="sexe" type="radio" class="form-check-input @error('sexe') is-invalid @enderror" name="sexe" value="Femme" {{ old('sexe') == "Femme" ? 'checked' : '' }} required autocomplete="sexe" >
                        <label class="checkbox" for="sexe">
                            Femme
                        </label>
    
                        <input style="margin-left: 20px" id="sexe" type="radio" class="form-check-input @error('sexe') is-invalid @enderror" name="sexe" value="Homme" {{ old('sexe') == "Homme" ? 'checked' : '' }} required autocomplete="sexe" >
                        <label class="checkbox" for="sexe">
                            Homme
                        </label>
    
                        @error('sexe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <button type="submit" class="form--submit">
                            {{ __('Register') }}
                        </button>
                </form>
                {{-- <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" >

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codemassar" class="col-md-4 col-form-label text-md-end">{{ __('Code Massar') }}</label>

                            <div class="col-md-6">
                                <input id="codemassar" type="text" class="form-control @error('codemassar') is-invalid @enderror" name="codemassar" value="{{ old('codemassar') }}" required autocomplete="codemassar" >

                                @error('codemassar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cin" class="col-md-4 col-form-label text-md-end">{{ __('CIN') }}</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" >

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="datenaissance" class="col-md-4 col-form-label text-md-end">{{ __('Date de naissance') }}</label>

                            <div class="col-md-6">
                                <input id="datenaissance" type="date" class="form-control @error('datenaissance') is-invalid @enderror" name="datenaissance" value="{{ old('datenaissance') }}" required autocomplete="datenaissance" >

                                @error('datenaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lieunaissance" class="col-md-4 col-form-label text-md-end">{{ __('Lieu de naissance') }}</label>

                            <div class="col-md-6">
                                <input list="lieunaissance1" id="lieunaissance" name="lieunaissance" class="form-control @error('lieunaissance') is-invalid @enderror" name="lieunaissance" value="{{ old('lieunaissance') }}" required autocomplete="lieunaissance">
                                <datalist id="lieunaissance1">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->city }}" >
                                    @endforeach
                                </datalist>

                                @error('lieunaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                            <div class="col-md-6">
                                <input list="ville1" id="ville" name="ville" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">
                                <datalist id="ville1">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->city }}" >
                                    @endforeach
                                </datalist>

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" >

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" >

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexe" class="col-md-4 col-form-label text-md-end">{{ __('Sexe') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="sexe" type="radio" class="form-check-input @error('sexe') is-invalid @enderror" name="sexe" value="Femme" {{ old('sexe') == "Femme" ? 'checked' : '' }} required autocomplete="sexe" >
                                <label class="form-check-label" for="sexe">
                                    Femme
                                </label>

                                <input id="sexe" type="radio" class="form-check-input @error('sexe') is-invalid @enderror" name="sexe" value="Homme" {{ old('sexe') == "Homme" ? 'checked' : '' }} required autocomplete="sexe" >
                                <label class="form-check-label" for="sexe">
                                    Homme
                                </label>

                                @error('sexe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
