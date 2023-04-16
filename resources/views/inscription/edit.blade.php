@extends('layouts.app')
@section('content')
@php
use App\Models\Maroc;
$cities= Maroc::all();
$user1=Auth::guard()->user();
// dd($kk);
// dd($baccalaureat);
@endphp
<style>
    .signup {
    color: #639;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    font-weight: bold;
    font-size: x-large;
    margin-bottom: 0.5em;
    }
    .label1 {
    color: rgb(77, 75, 75);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-left: 55px;
    text-align: start;
    display: block;
    font-weight: bold;
    font-size: small;
    margin-bottom: 0.5em;
    }
    .label2 {
    color: rgb(77, 75, 75);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-left: 55px;
    text-align: start;
    display: block;
    font-weight: bold;
    font-size: x-small;
    margin-bottom: 0.5em;
    }
    .label3 {
    color: rgb(124, 119, 119);
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: start;
    font-weight: bold;
    font-size: small;
    margin-bottom: 0.5em;
    }
    .form--input {
    width: 80%;
    margin-bottom: 1.25em;
    height: 40px;
    border-radius: 5px;
    border: 1px solid gray;
    padding: 0.5em;
    font-family: 'Inter', sans-serif;
    outline: none;
    }

    .form--input:focus {
    border: 1px solid #639;
    outline: none;
    }

    .form--inputt {
    width: 80%;
    margin-bottom: 1.25em;
    height: 40px;
    border-radius: 5px;
    border: 1px solid gray;
    padding: 0.25em;
    font-family: 'Inter', sans-serif;
    outline: none;
    }

    .form--inputt:focus {
    border: 1px solid #639;
    outline: none;
    }

    .form--marketing {
    /* display: flex; */
    width: 80%;
    margin-bottom: 1.25em;
    margin-left: 3em;
    text-align: left;
    }

    .form--marketing > input {
    margin-right: 0.625em;
    }

    .form--marketing > label {
        /* font-size: 13px; */
    }

    .checkbox, input[type="checkbox"] {
    accent-color: #639;
    margin-left: 15px;
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
    .card-container2 {
    border-radius: 5px;
    box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
    color: #333333;
    padding-top: 30px;
    position: relative;
    width: 500px;
    max-width: 100%;
    text-align: center;
    margin: 0 auto;
  }
   .skills label {
    display: block;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<form enctype='multipart/form-data' action="{{ url('inscription/'.$user->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="card-container2">
        <span class="signup">Modifier votre information</span>
        <label class="label1" for="nom">{{ __('nom :') }}</label>
        <input placeholder="Nom" id="nom" type="text" class="form--input @error('nom') is-invalid @enderror" name="nom" value="{{ $user->nom }}" required autocomplete="nom" autofocus>
        @error('nom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="prenom">{{ __('prenom :') }}</label>
        <input placeholder="Prenom" id="prenom" type="text" class="form--input @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}" required autocomplete="prenom">
        @error('prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="codemassar">{{ __('Code massar :') }}</label>
        <input placeholder="Code massar" id="codemassar" type="text" class="form--input @error('codemassar') is-invalid @enderror" name="codemassar" value="{{ $user->codemassar }}" required autocomplete="codemassar" >
        @error('codemassar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="cin">{{ __('cin :') }}</label>
        <input placeholder="CIN" id="cin" type="text" class="form--input @error('cin') is-invalid @enderror" name="cin" value="{{ $user->cin }}" required autocomplete="cin" >
        @error('cin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="datenaissance">{{ __('date de naissance :') }}</label>
        <input id="datenaissance" type="date" class="form--input @error('datenaissance') is-invalid @enderror" name="datenaissance" value="{{ $user->datenaissance }}" required autocomplete="datenaissance" >
        @error('datenaissance')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="lieunaissance">{{ __('lieu de naissance :') }}</label>
        <input list="lieunaissance1" placeholder="Lieu de naissance" id="lieunaissance" name="lieunaissance" class="form--input @error('lieunaissance') is-invalid @enderror" name="lieunaissance" value="{{ $user->lieunaissance }}" required autocomplete="lieunaissance">
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
        <label class="label1" for="ville">{{ __('ville :') }}</label>
        <input list="ville1" placeholder="Ville" id="ville" name="ville" class="form--input @error('ville') is-invalid @enderror" name="ville" value="{{ $user->ville }}" required autocomplete="ville">
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
        <label class="label1" for="adresse">{{ __('adresse :') }}</label>
        <input placeholder="Adresse" id="adresse" type="text" class="form--input @error('adresse') is-invalid @enderror" name="adresse" value="{{ $user->adresse }}" required autocomplete="adresse" >
        @error('adresse')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="telephone">{{ __('Numero de téléphone :') }}</label>
        <input placeholder="Numero de téléphone" id="telephone" type="text" class="form--input @error('telephone') is-invalid @enderror" name="telephone" value="{{ $user->telephone }}" required autocomplete="telephone" >
        @error('telephone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="sexe">{{ __('sexe :') }}</label>
        <div class="form--marketing">
            <div>
                <input id="sexe" type="radio" class="checkbox @error('sexe') is-invalid @enderror" name="sexe" value="Femme" <?php if ($user->sexe == 'Femme') echo 'checked'; ?> {{ old('sexe') == "Femme" ? 'checked' : '' }} required autocomplete="sexe" >
                <label class="label3" for="sexe">
                    Femme
                </label>
                <input id="sexe" type="radio" class="checkbox @error('sexe') is-invalid @enderror" name="sexe" value="Homme" <?php if ($user->sexe == 'Homme') echo 'checked'; ?> {{ old('sexe') == "Homme" ? 'checked' : '' }} required autocomplete="sexe" >
                <label class="label3" for="sexe">
                    Homme
                </label>
            </div>

            @error('sexe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    <div class="baccalaureat mb-3">
        <h2>Baccalaureat</h2>
        <label class="label1" for="typebaccalaureat">{{ __('Type baccalaureat :') }}</label>
        <input type="text" placeholder="Type baccalaureat" id="email" class="form--input @error('typebaccalaureat') is-invalid @enderror" name="typebaccalaureat" value="{{ $baccalaureat->typebaccalaureat }}" required autocomplete="typebaccalaureat" autofocus>
        @error('typebaccalaureat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="mentionbac">{{ __('mention baccalaureat :') }}</label>
        <select class="form--input" name="mentionbac">
            <option value="Très bien" <?php if ($baccalaureat->mentionbac == 'Très bien') echo 'selected'; ?>>Très bien</option>
            <option value="Bien" <?php if ($baccalaureat->mentionbac == 'Bien') echo 'selected'; ?>>Bien</option>
            <option value="Assez bien" <?php if ($baccalaureat->mentionbac == 'Assez bien') echo 'selected'; ?>>Assez bien</option>
            <option value="Passable" <?php if ($baccalaureat->mentionbac == 'Passable') echo 'selected'; ?>>Passable</option>
        </select>
        @error('mentionbac')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="diplome mb-3">
        <h2>Diplome</h2>
        <label class="label1" for="optiondiplome">{{ __('option diplome :') }}</label>
        <input id="optiondiplome" placeholder="Option diplome" type="text" class="form--input @error('optiondiplome') is-invalid @enderror" name="optiondiplome" value="{{ $diplome->optiondiplome }}" required autocomplete="optiondiplome">
        @error('optiondiplome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="etablissement">{{ __('etablissement :') }}</label>
        <input id="etablissement" placeholder="Etablissement" type="text" class="form--input @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ $diplome->etablissement }}" required autocomplete="etablissement">
        @error('etablissement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="villeetablissement">{{ __('ville etablissement :') }}</label>
        <input list="villeetablissement1" placeholder="Ville etablissement" id="villeetablissement" name="villeetablissement" class="form--input @error('villeetablissement') is-invalid @enderror" name="villeetablissement" value="{{ $diplome->villeetablissement }}" required autocomplete="villeetablissement">
        <datalist id="villeetablissement1">
            @foreach($cities as $city)
                <option value="{{ $city->city }}" >
            @endforeach
        </datalist>
        @error('villeetablissement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="moyenne">{{ __('moyenne diplome :') }}</label>
        <input id="moyenne" placeholder="xx,yy" type="text" class="form--input @error('moyenne') is-invalid @enderror" name="moyenne" value="{{ $diplome->moyenne }}" required autocomplete="moyenne">
        @error('moyenne')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="semestre mb-3">
        <h2>Semestre</h2>
        @foreach ( $semestre as $key => $semestre ) @if($user->id==$semestre->user_id )
        <label class="label1" for={{ 'moyenne'.$key+1 }}>
            {{ $semestre->semestre }} :
        </label>
        <input id={{ 'moyenne'.$key+1 }} placeholder="xx,yy" type="text" class="form--input @error('moyenne'.$key+1) is-invalid @enderror" name={{ 'moyenne'.$key+1 }} value="{{ $semestre->moyenne }}" required autocomplete={{ 'moyenne'.$key+1 }}><br>
        @error('moyenne'.$key+1)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror 
        @endif @endforeach
    </div>
    <div class="sousmodules pb-3">
    <h2>Sousmodules</h2>
        @foreach ( $sousmodule as $key => $sousmodule ) @if(Auth::id()==$sousmodule->user_id )
        <label class="label2" for={{ 'note'.$key+1 }}>{{ $sousmodule->sousmodule }} :</label>
        <input type="text" name={{"matiere".$key+1 }} value="Comptabilité générale I" hidden>
        <input id={{ 'note'.$key+1 }} placeholder="xx,yy" type="text" class="form--input @error('note'.$key+1) is-invalid @enderror" name={{ 'note'.$key+1 }} value="{{ $sousmodule->note }}"  autocomplete="{{ 'note'.$key+1 }}" >
        @error('note'.$key+1)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @endif @endforeach
    </div>
    <div class="skills pb-3">
        <h2>Documents</h2>
        <label class="label1" for="file1">Photo :</label>
        <input id="file1" type="file" class="form--inputt @error('file1') is-invalid @enderror" name="file1" value="{{ old('file1', $document->photo) }}" autocomplete="file1" >
        @error('file1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="file2">Relves :</label>
        <input id="file2" type="file" class="form--inputt @error('file2') is-invalid @enderror" name="file2" value="{{ old('file2', $document->relves) }}" autocomplete="file2" >
        @error('file2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="file3">Baccalaureat :</label>
        <input id="file3" type="file" class="form--inputt @error('file3') is-invalid @enderror" name="file3" value="{{ old('file3', $document->baccalaureat) }}" autocomplete="file3" >
        @error('file3')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="file5">Diplome :</label>
        <input id="file5" type="file" class="form--inputt @error('file5') is-invalid @enderror" name="file5" value="{{ old('file5', $document->diplome) }}" autocomplete="file5" >
        @error('file5')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="label1" for="file4">Demande :</label>
        <input id="file4" type="file" class="form--inputt @error('file4') is-invalid @enderror" name="file4" value="{{ old('file4', $document->demande) }}" autocomplete="file4" >
        @error('file4')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
<div class="col-md-12 pb-5" >
    <button type="submit" class="form--submit">
        {{ __('Modifier') }}
    </button>
</div>
</div>
</form>
@endsection
