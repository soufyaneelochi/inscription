@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">Nombre des inscriptions</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Today's Money</p>
            <h4 class="mb-0">{{ $count }}</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Today's Users</p>
            <h4 class="mb-0">2,300</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">New Clients</p>
            <h4 class="mb-0">3,462</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Sales</p>
            <h4 class="mb-0">$103,430</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
        </div>
    </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
    <div class="card">
        <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
            <h6>Liste des étudiants</h6>
            </div>
        </div>
        </div>
        <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom et Prenom</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Etablissement</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Note Diplome</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Type Baccalaureat</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mention Baccalaureat</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user) @if($user->isadmin!==1)
                <tr>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$user->nom.' '.$user->prenom}}</h6>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$user->diplome->etablissement}}</h6>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$user->diplome->moyenne}}</h6>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$user->baccalaureat->typebaccalaureat}}</h6>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$user->baccalaureat->mentionbac}}</h6>
                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="{{ route('admin.users.show', ['id' => $user->id]) }}">Show more</a>
                    </div>
                </td>
                </tr>
            @endif @endforeach
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
