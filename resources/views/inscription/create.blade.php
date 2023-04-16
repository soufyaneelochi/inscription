@extends('layouts.app')
@section('content')
@php
use App\Models\Maroc;
$cities= Maroc::all();
$kk=Auth::guard()->user();
// dd($kk);
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
    .form--input {
    width: 80%;
    margin-bottom: 1em;
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
    display: block;
    width: 80%;
    margin-bottom: 1.25em;
    margin-left: 3.5em;
    text-align: left;
    }

    .form--marketing > input  {
    margin-right: 0.625em;
    }

    .form--marketing > label {
        font-size: 13px;
    }

    .checkbox, input[type="checkbox"] {
    accent-color: #639;
    }

    .form--submit {
    width: 25%;
    padding: 0.5em;
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

    .form--next {
    width: 25%;
    padding: 0.5em;
    border-radius: 5px;
    color: white;
    background-color: #0D6EFD;
    border: 1px dashed #0D6EFD;
    cursor: pointer;
    margin-bottom: 15px;
    }

    .form--next:hover {
    color: #0D6EFD;
    background-color: white;
    border: 1px dashed #0D6EFD;
    cursor: pointer;
    transition: 0.5s;
    }

    .form--back {
    width: 25%;
    padding: 0.5em;
    border-radius: 5px;
    color: white;
    background-color: #6C757D;
    border: 1px dashed #6C757D;
    cursor: pointer;
    margin-bottom: 15px;
    }

    .form--back:hover {
    color: #6C757D;
    background-color: white;
    border: 1px dashed #6C757D;
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
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php echo($kk->isadmin) ?>
<form action="">
    <input type="text">
    @if ($kk->isadmin == 1)
        <input type="checkbox" name="" id=""><br>
    @endif
    <input type="text">
    <input type="checkbox" name="" id=""><br>
    <input type="submit">
</form>

<form class="form" enctype='multipart/form-data' action={{ url('inscription') }} method="POST">
    @csrf
<div class="card-container2">
    <fieldset id="section-1">
        <input type="text" name="user_id" value="<?php echo($kk->id) ?>" hidden>
        <label for="typebaccalaureat" class="label1">{{ __('Type baccalaureat :') }}</label>
        <input id="typebaccalaureat" type="text" class="form--input @error('typebaccalaureat') is-invalid @enderror" name="typebaccalaureat" value="{{ old('typebaccalaureat') }}" required autocomplete="typebaccalaureat" autofocus>
        @error('typebaccalaureat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="mentionbac" class="label1">{{ __('Mention BAC :') }}</label>
        <select class="form--input" name="mentionbac">
            <option value="">Select one</option>
            <option value="Très bien">Très bien</option>
            <option value="Bien">Bien</option>
            <option value="Assez bien">Assez bien</option>
            <option value="Passable">Passable</option>
        </select>
        @error('mentionbac')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="typediplome" class="label1">{{ __('Type de diplôme :') }}</label>
        <div class="form--marketing">
            <div class="">
                <input  id="DEUG" type="radio" class="checkbox @error('typediplome') is-invalid @enderror" name="typediplome" value="DEUG" {{ old('typediplome') == "DEUG" ? 'checked' : '' }} required autocomplete="typediplome" >
                <label class="checkbox" for="typediplome">
                    DEUG en Sciences économiques et gestion
                </label>
            </div>
            <div class="">
                <input id="BTS" type="radio" class="checkbox @error('typediplome') is-invalid @enderror" name="typediplome" value="BTS" {{ old('typediplome') == "BTS" ? 'checked' : '' }} required autocomplete="typediplome" >
                <label class="checkbox" for="typediplome">
                    BTS en comptabilité et gestion
                </label>
            </div>
            <div class="">
                <input id="DUT" type="radio" class="checkbox @error('typediplome') is-invalid @enderror" name="typediplome" value="DUT" {{ old('typediplome') == "DUT" ? 'checked' : '' }} required autocomplete="typediplome" >
                <label class="checkbox" for="typediplome">
                    DUT en Techniques de management
                </label>
            </div>
            <div class="">
                <input id="DTS" type="radio" class="checkbox @error('typediplome') is-invalid @enderror" name="typediplome" value="DTS" {{ old('typediplome') == "DTS" ? 'checked' : '' }} required autocomplete="typediplome" >
                <label class="checkbox" for="typediplome">
                    DTS en Finance et comptabilité
                </label>  
            </div>
        </div> 
        
        <label for="optiondiplome" class="label1">{{ __('Option du diplôme :') }}</label>
        <input id="optiondiplome" type="text" class="form--input @error('optiondiplome') is-invalid @enderror" name="optiondiplome" value="{{ old('optiondiplome') }}" required autocomplete="optiondiplome">
        @error('optiondiplome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <label for="etablissement" class="label1">{{ __('Etablissement :') }}</label>
        <input id="etablissement" type="text" class="form--input @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement') }}" required autocomplete="etablissement">
        @error('etablissement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="villeetablissement" class="label1">{{ __('Ville d\'Etablissement :') }}</label>
        <input list="villeetablissement1" id="villeetablissement" name="villeetablissement" class="form--input @error('villeetablissement') is-invalid @enderror" name="villeetablissement" value="{{ old('villeetablissement') }}" required autocomplete="villeetablissement">
        <datalist id="villeetablissement1">
            @foreach($cities as $city)
                <option value="{{ $city->city }}" >
            @endforeach
        </datalist>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="moyenne" class="label1">{{ __('Moyenne du diplome :') }}</label>
        <input id="moyenne" placeholder="xx,yy" type="text" class="form--input @error('moyenne') is-invalid @enderror" name="moyenne" value="{{ old('moyenne') }}" required autocomplete="moyenne">
        @error('moyenne')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="button" class="next-section form--next" data-section="section-2">
            {{ __('Suivant') }}
        </button>
    </fieldset>
    <fieldset id="section-2" style="display:none">
        <div id="inputs1">
            <label for="moyenne1" class="label1">{{ __('S1 :') }}</label>
            <input type="text" name="semestre1" value="S1" hidden>
            <input id="moyenne1" placeholder="xx,yy" type="text" class="form--input @error('moyenne1') is-invalid @enderror" name="moyenne1" value="{{ old('moyenne1') }}"  autocomplete="moyenne1" disabled>
            @error('moyenne1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="moyenne2" class="label1">{{ __('S2 :') }}</label>
            <input type="text" name="semestre2" value="S2" hidden>
            <input id="moyenne2" placeholder="xx,yy" type="text" class="form--input @error('moyenne2') is-invalid @enderror" name="moyenne2" value="{{ old('moyenne2') }}"  autocomplete="moyenne2" disabled>
            @error('moyenne2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="moyenne3" class="label1">{{ __('S3 :') }}</label>
            <input type="text" name="semestre3" value="S3" hidden>
            <input id="moyenne3" placeholder="xx,yy" type="text" class="form--input @error('moyenne3') is-invalid @enderror" name="moyenne3" value="{{ old('moyenne3') }}"  autocomplete="moyenne3" disabled>
            @error('moyenne3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="moyenne4" class="label1">{{ __('S4 :') }}</label>
            <input type="text" name="semestre4" value="S4" hidden>
            <input id="moyenne4" placeholder="xx,yy" type="text" class="form--input @error('moyenne4') is-invalid @enderror" name="moyenne4" value="{{ old('moyenne4') }}"  autocomplete="moyenne4" disabled>
            @error('moyenne4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div id="inputs2" style="display: none;">
            <label for="moyenne5" class="label1">{{ __('1ére année :') }}</label>
            <input type="text" name="semestre5" value="1ére annee" hidden>
            <input id="moyenne5" placeholder="xx,yy" type="text" class="form--input @error('moyenne5') is-invalid @enderror" name="moyenne5" value="{{ old('moyenne5') }}"  autocomplete="moyenne5" disabled>
            @error('moyenne5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="moyenne6" class="label1">{{ __('2éme année :') }}</label>
            <input type="text" name="semestre6" value="2éme annee" hidden>
            <input id="moyenne6" placeholder="xx,yy" type="text" class="form--input @error('moyenne6') is-invalid @enderror" name="moyenne6" value="{{ old('moyenne6') }}"  autocomplete="moyenne6" disabled>
            @error('moyenne6')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="button" class="previous-section form--back" data-section="section-1">
            {{ __('Retour') }}
        </button>
        <button type="button" class="next-section form--next" data-section="section-3">
            {{ __('Suivant') }}
        </button>
    </fieldset>
    <fieldset id="section-3" style="display:none">
        <div id="inputsdeug">
            <h3 class="signup">Comptabilité financière</h3>
            <label for="deugnote1" class="label1">{{ __('Comptabilité générale I :') }}</label>
            <input type="text" name="deugmatiere1" value="Comptabilité générale I" hidden>
            <input id="deugnote1" placeholder="xx,yy" type="text" class="form--input @error('deugnote1') is-invalid @enderror" name="deugnote1" value="{{ old('deugnote1') }}"  autocomplete="deugnote1" >
            @error('deugnote1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="deugnote2" class="label1">{{ __('Comptabilité générale II :') }}</label>
            <input type="text" name="deugmatiere2" value="Comptabilité générale II" hidden>
            <input id="deugnote2" placeholder="xx,yy" type="text" class="form--input @error('deugnote2') is-invalid @enderror" name="deugnote2" value="{{ old('deugnote2') }}"  autocomplete="deugnote2" >
            @error('deugnote2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="deugnote3" class="label1">{{ __('Comptabilité des sociétés :') }}</label>
            <input type="text" name="deugmatiere3" value="Comptabilité des sociétés" hidden>
            <input id="deugnote3" placeholder="xx,yy" type="text" class="form--input @error('deugnote3') is-invalid @enderror" name="deugnote3" value="{{ old('deugnote3') }}"  autocomplete="deugnote3" >
            @error('deugnote3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h3 class="signup">Comptabilité analytique</h3>
            <label for="deugnote4" class="label1">{{ __('Comptabilité analytique :') }}</label>
            <input type="text" name="deugmatiere4" value="Comptabilité analytique" hidden>
            <input id="deugnote4" placeholder="xx,yy" type="text" class="form--input @error('deugnote4') is-invalid @enderror" name="deugnote4" value="{{ old('deugnote4') }}"  autocomplete="deugnote4" >
            @error('deugnote4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h3 class="signup">Analyse financière</h3>
            <label for="deugnote5" class="label1">{{ __('Analyse financière :') }}</label>
            <input type="text" name="deugmatiere5" value="Analyse financière" hidden>
            <input id="deugnote5" placeholder="xx,yy" type="text" class="form--input @error('deugnote5') is-invalid @enderror" name="deugnote5" value="{{ old('deugnote5') }}"  autocomplete="deugnote5" >
            @error('deugnote5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div id="inputsbts">
            <h1>BTS</h1>
            <h3 class="signup">Comptabilité financière</h3>
            <label for="btsnote1" class="label2">{{ __('Production des documents comptables et financiers S1 :') }}</label>
            <input type="text" name="btsmatiere1" value="Production des documents comptables et financiers S1" hidden>
            <input id="btsnote1" placeholder="xx,yy" type="text" class="form--input @error('btsnote1') is-invalid @enderror" name="btsnote1" value="{{ old('btsnote1') }}"  autocomplete="btsnote1" >
            @error('btsnote1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                
            <label for="btsnote2" class="label2">{{ __('Production des documents comptables et financiers S2 :') }}</label>
            <input type="text" name="btsmatiere2" value="Production des documents comptables et financiers S2" hidden>
            <input id="btsnote2" placeholder="xx,yy" type="text" class="form--input @error('btsnote2') is-invalid @enderror" name="btsnote2" value="{{ old('btsnote2') }}"  autocomplete="btsnote2" >
            @error('btsnote2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="btsnote3" class="label2">{{ __('Production des documents comptables et financiers S3 :') }}</label>
            <input type="text" name="btsmatiere3" value="Production des documents comptables et financiers S3" hidden>
            <input id="btsnote3" placeholder="xx,yy" type="text" class="form--input @error('btsnote3') is-invalid @enderror" name="btsnote3" value="{{ old('btsnote3') }}"  autocomplete="btsnote3" >
            @error('btsnote3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="btsnote4" class="label2">{{ __('Production des documents comptables et financiers S4 :') }}</label>
            <input type="text" name="btsmatiere4" value="Production des documents comptables et financiers S4" hidden>
            <input id="btsnote4" placeholder="xx,yy" type="text" class="form--input @error('btsnote4') is-invalid @enderror" name="btsnote4" value="{{ old('btsnote4') }}"  autocomplete="btsnote4" >
            @error('btsnote4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <h3 class="signup">Contrôle de gestion</h3>
            <label for="btsnote5" class="label2">{{ __('Analyse des documents financiers :') }}</label>
            <input type="text" name="btsmatiere5" value="Analyse des documents financiers" hidden>
            <input id="btsnote5" placeholder="xx,yy" type="text" class="form--input @error('btsnote5') is-invalid @enderror" name="btsnote5" value="{{ old('btsnote5') }}"  autocomplete="btsnote5" >
            @error('btsnote5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="btsnote6" class="label2">{{ __('Analyse et contrôle des coûts S1 :') }}</label>
            <input type="text" name="btsmatiere6" value="Analyse et contrôle des coûts S1" hidden>
            <input id="btsnote6" placeholder="xx,yy" type="text" class="form--input @error('btsnote6') is-invalid @enderror" name="btsnote6" value="{{ old('btsnote6') }}"  autocomplete="btsnote6" >
            @error('btsnote6')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="btsnote7" class="label2">{{ __('Analyse et contrôle des coûts S2 :') }}</label>
            <input type="text" name="btsmatiere7" value="Analyse et contrôle des coûts S2" hidden>
            <input id="btsnote7" placeholder="xx,yy" type="text" class="form--input @error('btsnote7') is-invalid @enderror" name="btsnote7" value="{{ old('btsnote7') }}"  autocomplete="btsnote7" >
            @error('btsnote7')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="btsnote8" class="label2">{{ __('Analyse et contrôle des coûts S3 :') }}</label>
            <input type="text" name="btsmatiere8" value="Analyse et contrôle des coûts S3" hidden>
            <input id="btsnote8" placeholder="xx,yy" type="text" class="form--input @error('btsnote8') is-invalid @enderror" name="btsnote8" value="{{ old('btsnote8') }}"  autocomplete="btsnote8" >
            @error('btsnote8')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="btsnote9" class="label2">{{ __('Analyse et contrôle des coûts S4 :') }}</label>
            <input type="text" name="btsmatiere9" value="Analyse et contrôle des coûts S4" hidden>
            <input id="btsnote9" placeholder="xx,yy" type="text" class="form--input @error('btsnote9') is-invalid @enderror" name="btsnote9" value="{{ old('btsnote9') }}"  autocomplete="btsnote9" >
            @error('btsnote9')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div id="inputsdut">
            <h1>DUT</h1>
            <h3 class="signup">Comptabilité financière</h3>
            <label for="dutnote1" class="label1">{{ __('Comptabilité de base :') }}</label>
            <input type="text" name="dutmatiere1" value="Comptabilité de base" hidden>
            <input id="dutnote1" placeholder="xx,yy" type="text" class="form--input @error('dutnote1') is-invalid @enderror" name="dutnote1" value="{{ old('dutnote1') }}"  autocomplete="dutnote1" >
            @error('dutnote1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="dutnote2" class="label1">{{ __('Travaux d’inventaires :') }}</label>
            <input type="text" name="dutmatiere2" value="Travaux d’inventaires" hidden>
            <input id="dutnote2" placeholder="xx,yy" type="text" class="form--input @error('dutnote2') is-invalid @enderror" name="dutnote2" value="{{ old('dutnote2') }}"  autocomplete="dutnote2" >
            @error('dutnote2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="dutnote3" class="label1">{{ __('Comptabilité approfondie et des sociétés :') }}</label>
            <input type="text" name="dutmatiere3" value="Comptabilité approfondie et des sociétés" hidden>
            <input id="dutnote3" placeholder="xx,yy" type="text" class="form--input @error('dutnote3') is-invalid @enderror" name="dutnote3" value="{{ old('dutnote3') }}"  autocomplete="dutnote3" >
            @error('dutnote3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h3 class="signup">Fiscalité de l’entreprise</h3>
            <label for="dutnote4" class="label1">{{ __('Fiscalité de l’entreprise :') }}</label>
            <input type="text" name="dutmatiere4" value="Fiscalité de l’entreprise" hidden>
            <input id="dutnote4" placeholder="xx,yy" type="text" class="form--input @error('dutnote4') is-invalid @enderror" name="dutnote4" value="{{ old('dutnote4') }}"  autocomplete="dutnote4" >
            @error('dutnote4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h3 class="signup">Gestion financière</h3>
            <label for="dutnote5" class="label1">{{ __('Analyse financière :') }}</label>
            <input type="text" name="dutmatiere5" value="Analyse financière" hidden>
            <input id="dutnote5" placeholder="xx,yy" type="text" class="form--input @error('dutnote5') is-invalid @enderror" name="dutnote5" value="{{ old('dutnote5') }}"  autocomplete="dutnote5" >
            @error('dutnote5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="dutnote6" class="label1">{{ __('Gestion du portefeuille :') }}</label>
            <input type="text" name="dutmatiere6" value="Gestion du portefeuille" hidden>
            <input id="dutnote6" placeholder="xx,yy" type="text" class="form--input @error('dutnote6') is-invalid @enderror" name="dutnote6" value="{{ old('dutnote6') }}"  autocomplete="dutnote6" >
            @error('dutnote6')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>
        <div id="inputsdts">
            <h1>DTS</h1>
            <h3 class="signup">Comptabilité financière</h3>
            <label for="dtsnote1" class="label2">{{ __('Les concepts de base :') }}</label>
            <input type="text" name="dtsmatiere1" value="les concepts de base" hidden>
            <input id="dtsnote1" placeholder="xx,yy" type="text" class="form--input @error('dtsnote1') is-invalid @enderror" name="dtsnote1" value="{{ old('dtsnote1') }}"  autocomplete="dtsnote1" >
            @error('dtsnote1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="dtsnote2" class="label2">{{ __('Les opérations courantes :') }}</label>
            <input type="text" name="dtsmatiere2" value="les opérations courantes" hidden>
            <input id="dtsnote2" placeholder="xx,yy" type="text" class="form--input @error('dtsnote2') is-invalid @enderror" name="dtsnote2" value="{{ old('dtsnote2') }}"  autocomplete="dtsnote2" >
            @error('dtsnote2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="dtsnote3" class="label2">{{ __('Comptabilité approfondies et révision des comptes :') }}</label>
            <input type="text" name="dtsmatiere3" value="Comptabilité approfondies et révision des comptes" hidden>
            <input id="dtsnote3" placeholder="xx,yy" type="text" class="form--input @error('dtsnote3') is-invalid @enderror" name="dtsnote3" value="{{ old('dtsnote3') }}"  autocomplete="dtsnote3" >
            @error('dtsnote3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="dtsnote4" class="label2">{{ __('Consolidations et normes comptables internationales :') }}</label>
            <input type="text" name="dtsmatiere4" value="Consolidations et normes comptables internationales" hidden>
            <input id="dtsnote4" placeholder="xx,yy" type="text" class="form--input @error('dtsnote4') is-invalid @enderror" name="dtsnote4" value="{{ old('dtsnote4') }}"  autocomplete="dtsnote4" >
            @error('dtsnote4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h3 class="signup">Contrôle de gestion</h3>
            <label for="dtsnote5" class="label2">{{ __('Comptabilité analytique :') }}</label>
            <input type="text" name="dtsmatiere5" value="Comptabilité analytique" hidden>
            <input id="dtsnote5" placeholder="xx,yy" type="text" class="form--input @error('dtsnote5') is-invalid @enderror" name="dtsnote5" value="{{ old('dtsnote5') }}"  autocomplete="dtsnote5" >
            @error('dtsnote5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
            <label for="dtsnote6" class="label2">{{ __('Budget et tableau de bord :') }}</label>
            <input type="text" name="dtsmatiere6" value="Budget et tableau de bord" hidden>
            <input id="dtsnote6" placeholder="xx,yy" type="text" class="form--input @error('dtsnote6') is-invalid @enderror" name="dtsnote6" value="{{ old('dtsnote6') }}"  autocomplete="dtsnote6" >
            @error('dtsnote6')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="dtsnote7" class="label2">{{ __('Gestion de trésorerie :') }}</label>
            <input type="text" name="dtsmatiere7" value="Gestion de trésorerie" hidden>
            <input id="dtsnote7" placeholder="xx,yy" type="text" class="form--input @error('dtsnote7') is-invalid @enderror" name="dtsnote7" value="{{ old('dtsnote7') }}"  autocomplete="dtsnote7" >
            @error('dtsnote7')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <h3 class="signup">Analyse financière</h3>
            <label for="dtsnote8" class="label2">{{ __('Moyenne Analyse financière :') }}</label>
            <input type="text" name="dtsmatiere8" value="Analyse financière" hidden>
            <input id="dtsnote8" placeholder="xx,yy" type="text" class="form--input @error('dtsnote8') is-invalid @enderror" name="dtsnote8" value="{{ old('dtsnote8') }}"  autocomplete="dtsnote8" >
            @error('dtsnote8')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    
        </div>
        <button type="button" class="previous-section form--back" data-section="section-2">
            {{ __('Retour') }}
        </button>
        <button type="button" class="next-section form--next" data-section="section-4">
            {{ __('Suivant') }}
        </button>
    </fieldset>
    <fieldset id="section-4" style="display:none">
        <div class="row mb-3">
            <label for="file1" class="label1">{{ __('Importer votre photo :') }}</label>
            <div class="col-md-12">
                <input id="file1" type="file" class="form--inputt @error('file1') is-invalid @enderror" name="file1" value="{{ old('file1') }}" required autocomplete="file1" >
                @error('file1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="file2" class="label1">{{ __('Importer votre relvès :') }}</label>
            <div class="col-md-12">
                <input id="file2" type="file" class="form--inputt @error('file2') is-invalid @enderror" name="file2" value="{{ old('file2') }}" required autocomplete="file2" >
                @error('file2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="file3" class="label1">{{ __('Importer votre baccalaureat :') }}</label>
            <div class="col-md-12">
                <input id="file3" type="file" class="form--inputt @error('file3') is-invalid @enderror" name="file3" value="{{ old('file3') }}" required autocomplete="file3" >
                @error('file3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="file5" class="label1">{{ __('Importer votre diplome :') }}</label>
            <div class="col-md-12">
                <input id="file5" type="file" class="form--inputt @error('file5') is-invalid @enderror" name="file5" value="{{ old('file5') }}" required autocomplete="file5" >
                @error('file5')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="file4" class="label1">{{ __('Importer votre demande :') }}</label>
            <div class="col-md-12">
                <input id="file4" type="file" class="form--inputt @error('file4') is-invalid @enderror" name="file4" value="{{ old('file4') }}" required autocomplete="file4" >
                @error('file4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="button" class="previous-section form--back" data-section="section-3">
            {{ __('Retour') }}
        </button>
        <button type="submit" class="form--submit">
            {{ __('Register') }}
        </button>
    </fieldset>
</div>
</form>
<script>
    // $(document).ready(function() {
    // // disable the "Suivant" button initially
    // $('#section-1 .next-section').prop('disabled', true);

    // // add an event listener to the "Suivant" button
    // $('#section-1 .next-section').click(function() {
    //     // check if all the inputs in the first fieldset are not empty
    //     var inputs = $('#section-1 input[type="text"], #section-1 select');
    //     var empty = false;
    //     inputs.each(function() {
    //     if ($(this).val() === '') {
    //         empty = true;
    //         return false; // break out of the loop
    //     }
    //     });

    //     // if any input is empty, prevent the user from proceeding to the next fieldset
    //     if (empty) {
    //     alert('Please fill in all the fields before proceeding.');
    //     return false;
    //     }

    //     // otherwise, allow the user to proceed to the next fieldset
    //     $('#section-1').hide();
    //     $('#section-2').show();
    //     $('#section-2 input[type="text"]').prop('disabled', false);
    // });
    // });
    $('.next-section, .previous-section').on('click', function() {
        var currentSection = $(this).parent();
        var nextSection = $('#' + $(this).data('section'));
        if (nextSection.length) {
            currentSection.hide();
            nextSection.show();
        } else {
            console.error('Section not found: ' + $(this).data('section'));
        }
    });
    $(document).ready(function() {
        $('#inputsdeug input[type=text], #inputsbts input[type=text], #inputsdut input[type=text], #inputsdts input[type=text]').attr('disabled', true);                    
        $('#DEUG, #BTS, #DUT, #DTS').change(function() {
        if ($('#DEUG').is(':checked')) {
            $('#inputsdeug').show();
            $('#inputsbts').hide();
            $('#inputsdut').hide();
            $('#inputsdts').hide();
            $('#inputsdeug input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs2
            $('#inputsbts input[type=text]').val('');
            $('#inputsdut input[type=text]').val('');
            $('#inputsdts input[type=text]').val('');
            $('#inputsbts input[type=text]').attr('disabled', true);
            $('#inputsdut input[type=text]').attr('disabled', true);
            $('#inputsdts input[type=text]').attr('disabled', true);
        }
        else if ($('#BTS').is(':checked')) {
            $('#inputsdeug').hide();
            $('#inputsbts').show();
            $('#inputsdut').hide();
            $('#inputsdts').hide();
            $('#inputsbts input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs2
            $('#inputsdeug input[type=text]').val('');
            $('#inputsdut input[type=text]').val('');
            $('#inputsdts input[type=text]').val('');
            $('#inputsdeug input[type=text]').attr('disabled', true);
            $('#inputsdut input[type=text]').attr('disabled', true);
            $('#inputsdts input[type=text]').attr('disabled', true);
        }
        else if ($('#DUT').is(':checked')) {
            $('#inputsdeug').hide();
            $('#inputsbts').hide();
            $('#inputsdut').show();
            $('#inputsdts').hide();
            $('#inputsdut input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs2
            $('#inputsbts input[type=text]').val('');
            $('#inputsdeug input[type=text]').val('');
            $('#inputsdts input[type=text]').val('');
            $('#inputsbts input[type=text]').attr('disabled', true);
            $('#inputsdeug input[type=text]').attr('disabled', true);
            $('#inputsdts input[type=text]').attr('disabled', true);

        }
        else if ($('#DTS').is(':checked')) {
            $('#inputsdeug').hide();
            $('#inputsbts').hide();
            $('#inputsdut').hide();
            $('#inputsdts').show();
            $('#inputsdts input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs2
            $('#inputsbts input[type=text]').val('');
            $('#inputsdut input[type=text]').val('');
            $('#inputsdeug input[type=text]').val('');
            $('#inputsbts input[type=text]').attr('disabled', true);
            $('#inputsdut input[type=text]').attr('disabled', true);
            $('#inputsdeug input[type=text]').attr('disabled', true);
        }
        });
    });
    $(document).ready(function() {
        $('#inputs1 input[type=text], #inputs2 input[type=text]').attr('disabled', true);
        $('#DEUG, #BTS, #DUT, #DTS').change(function() {
        if ($('#DEUG, #BTS, #DUT').is(':checked')) {
            $('#inputs1').show();
            $('#inputs2').hide();
            $('#inputs1 input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs2
            $('#inputs2 input[type=text]').val('');
            $('#inputs2 input[type=text]').attr('disabled', false);
        }
        else if ($('#DTS').is(':checked')) {
            $('#inputs1').hide();
            $('#inputs2').show();
            $('#inputs2 input[type=text]').attr('disabled', false);
            // Clear the values of text inputs in #inputs1
            $('#inputs1 input[type=text]').val('');
            $('#inputs1 input[type=text]').attr('disabled', false);
        }
        });
});
</script>
@endsection
