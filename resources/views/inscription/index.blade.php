@extends('layouts.app')

@section('content')
@php
$user1=Auth::guard()->user();
@endphp
<style>
  body {
    font-family: Montserrat, sans-serif;
  }

  h3 {
    text-align: center;
  }
  h2 {
    color: #639;
  }

  p {
    font-size: 14px;
    line-height: 21px;
  }

  .card-container {
    border-radius: 5px;
    box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
    color: #333333;
    padding-top: 30px;
    position: relative;
    width: 350px;
    max-width: 100%;
    text-align: center;
    margin: 0 auto;
  }

  .card-container .round {
    border: 1px solid #639;
    border-radius: 50%;
    padding: 7px;
    width: 150px;
    height: 150px;
    object-fit: cover;
  }


  .skills {
    /* background-color: #1F1A36; */
    /* text-align: left; */
    padding: 15px;
    margin-top: 30px;
  }

  .skills ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  .skills ul li {
    border: 1px solid #2D2747;
    border-radius: 2px;
    display: inline-block;
    font-size: 12px;
    margin: 0 7px 7px 0;
    padding: 7px;
  }
  .skills ul li a {
    text-decoration: none;
  }
  .info {
    text-align: left;
    padding: 15px;
  }

  .info ul {
    list-style-type: none;
    margin: 0;
    padding-left: 50px;
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
  table{
    margin: 0 auto;
  }
  table td{
    text-align: left;
  }
  @media (max-width: 768px) {
      .profile-card {
          max-width: 100%;
      }

      table td{
        font-size: 15px;
      }
  }
  .edit{
  display: inline-block;
  padding: 0.5em 1em;
  border: 1px solid #639;
  color: #639;
  text-decoration: none;
  text-align: center;
  font-weight: bold;
  border-radius: 4px;
}
.edit:hover {
  background-color: #639;
  color: #fff;
}
</style>

<div class="card-container mb-5">
  @foreach ( $documents as $document ) @if($user1->id==$document->user_id)
      <img src={{$document->photo}}  alt="Profile Image" class="round">
  @endif @endforeach
  @foreach ( $users as $user ) @if($user1->id==$user->id)
      <div class="info">
        <h3>{{$user->nom .' '. $user->prenom}} </h3>
        <ul>
            <li><strong>Email:</strong> {{$user->email}}</li>
            <li><strong>Phone:</strong> {{$user->telephone}}</li>
            <li><strong>Code Massar:</strong> {{$user->codemassar}} </li>
            <li><strong>CIN:</strong> {{$user->cin}} </li>
            <li><strong>date de naissance:</strong> {{$user->datenaissance }}</li>
            <li><strong>lieu de naissance:</strong> {{$user->lieunaissance}}</li>
            <li><strong>ville:</strong> {{$user->ville}}</li>
            <li><strong>adresse:</strong> {{$user->adresse}}</li>
            <li><strong>sexe:</strong> {{$user->sexe}}</li>
        </ul>
      </div>
	<div class="buttons pb-3">
    <a href="{{ url('inscription/'. $user->id .'/edit') }}" class="edit">Modifier</a>
	</div>
    @endif @endforeach
</div>
<div class="card-container2">
  <div class="baccalaureat mb-3">
    <h2>Baccalaureat</h2>
    <table>
    @foreach ( $baccalaureats as $baccalaureat ) @if($user1->id==$baccalaureat->user_id)
      <thead>
        <tr>
          <td class="p-3"> {{$baccalaureat->typebaccalaureat}}</td>
          <td class="p-3"> {{$baccalaureat->mentionbac}}</td>
        </tr>
      </thead>
    @endif @endforeach
    </table>
  </div>
  <div class="diplome mb-3">
    <h2>Diplome</h2>
    <table>
      @foreach ( $diplomes as $diplome ) @if($user1->id==$diplome->user_id)
      <tbody>
        <tr>
          <td class="p-1">{{$diplome->typediplome}}</td>
          <td class="p-1">{{$diplome->optiondiplome}}</td>
          <td class="p-1">{{$diplome->moyenne}}</td>
          <td class="p-1">{{$diplome->etablissement}}</td>
          <td class="p-1">{{$diplome->villeetablissement}}</td>
        </tr>
      </tbody>
      @endif @endforeach
    </table>
  </div>
  <div class="semestre mb-3">
    <h2>Semestre</h2>
    <table>
      @foreach ( $semestres as $semestre ) @if($user1->id==$semestre->user_id)
      <thead>
        <tr>
          <td class="p-2 ">{{$semestre->semestre}}</td>
          <td class="p-2 ">{{$semestre->moyenne}}</td>
        </tr>
      </thead>
      @endif @endforeach
    </table>
  </div>
  <div class="sousmodules mb-3">
    <h2>Sousmodules</h2>
    <table>
      @foreach ( $sousmodules as $sousmodule ) @if($user1->id==$sousmodule->user_id)
      <thead>
        <tr>
          <td class="p-2 ">{{$sousmodule->sousmodule}}</td>
          <td class="p-2 ">{{$sousmodule->note}}</td>
        </tr>
      </thead>
      @endif @endforeach
    </table>
  </div>
  <div class="skills mb-3">
    <h2>Documents</h2>
      @foreach ( $documents as $document ) @if($user1->id==$document->user_id)
      <ul>
          <li class="p-2 "><a href="{{ $document->photo }}" target="_blank">view photo</a></li>
          <li class="p-2 "><a href="{{$document->relves}}" target="_blank">view relves</a></li>
          <li class="p-2 "><a href="{{$document->baccalaureat}}" target="_blank">view baccalaureat</a></li>
          <li class="p-2 "><a href="{{$document->diplome}}" target="_blank">view diplome</a></li>
          <li class="p-2 "><a href="{{$document->demande}}" target="_blank">view demande</a></li>
      </ul>
      @endif @endforeach
  </div>
</div>
@endsection
