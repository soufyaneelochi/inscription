@extends('layouts.app')

@section('content')
<style>
    .toggle-button {
        margin-top: 10px;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .toggle-div {
        margin-top: 10px;
    }
    .toggle-div a {
        display: inline-block;
        margin-right: 10px;
        padding: 5px 10px;
        background-color: gray;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
    .toggle-div iframe {
        border: none;
    }
    .hd1 {
    background-color: #007bff;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    padding: 12px 20px;
    } 
    
    
    p {
    font-size: 20px;
    font-weight: bold;
    color: #ffff;
    display: inline-block;
    padding-bottom: 8px;
    }

    h6 {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    display: inline-block;
    padding-bottom: 8px;
    }

    .toggle-button {
    background-color: #007bff;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 12px;
    }

    .toggle-button:hover {
    background-color: #0056b3;
    }

    .toggle-div a {
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    margin-bottom: 8px;
    display: block;
    }

    .toggle-div iframe {
    border: none;
    } 
    .go-back-btn {
    display: inline-block;
    padding: 8px 16px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    margin-bottom: 15px;
    }

    .go-back-btn:hover {
    background-color: #3e8e41;
    }

    .go-back-btn i {
    margin-right: 8px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid px-2 px-md-4">
    <button type="button" class="go-back-btn" onclick="window.location.href='{{ route('admin.index') }}'">
        <i class="fas fa-arrow-left"></i> Go back
    </button>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 my-2 mx-1">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img
                        src="{{$document->photo}}"
                        alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm"
                        width="100px" height="100px"
                        onclick="showImage(this.src)"
                        />
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">{{$user->nom.' '.$user->prenom}}</h5>
                    <span class="mb-0 font-weight-normal text-sm">
                        {{$user->datenaissance}}
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header hd1 pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <p class="mb-1">Profile Information</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Email:</strong> {{$user->email}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Phone:</strong> {{$user->telephone}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Code Massar:</strong> {{$user->codemassar}} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>CIN:</strong> {{$user->cin}} </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>date de naissance:</strong> {{$user->datenaissance }}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>lieu de naissance:</strong> {{$user->lieunaissance}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>ville:</strong> {{$user->ville}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>adresse:</strong> {{$user->adresse}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>sexe:</strong> {{$user->sexe}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header hd1 pb-0 p-3">
                        <p class="mb-1">Baccalaureat & Diplome</p>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Type baccalaureat :</strong> {{$baccalaureat->typebaccalaureat}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Mention baccalaureat :</strong> {{$baccalaureat->mentionbac}}</li>
                        </ul>
                        <hr class="horizontal gray-light my-4" />
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Type diplome :</strong> {{$diplome->optiondiplome}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Etablissement :</strong> {{$diplome->etablissement}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Ville etablissement :</strong> {{$diplome->villeetablissement}}</li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Moyenne diplome:</strong> {{$diplome->moyenne}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header hd1 pb-0 p-3">
                        <p class="mb-1">Semestre & Matière</p>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            @foreach ( $semestres as $semestre )
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>{{$semestre->semestre}} :</strong> {{$semestre->moyenne}}</li>
                            @endforeach
                        </ul>
                        <hr class="horizontal gray-light my-4" />
                        <ul class="list-group">
                            @foreach ( $sousmodules as $sousmodule )
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>{{$sousmodule->sousmodule}} :</strong> {{$sousmodule->note}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4">
                                <h6 class="mx-3 my-2">Baccalaureat</h6>
                            </div>
                            <div class="card-body p-3">
                                <button class="toggle-button">Show More</button>
                                <div class="toggle-div" style="display: none;">
                                    <a href="{{ url($document->baccalaureat) }}" target="_blank">View PDF</a>
                                    <iframe src="{{ url($document->baccalaureat) }}" width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4">
                                <h6 class="mx-3 my-2">Diplome</h6>
                            </div>
                            <div class="card-body p-3">
                                <button class="toggle-button">Show More</button>
                                <div class="toggle-div" style="display: none;">
                                    <a href="{{ url($document->diplome) }}" target="_blank">View PDF</a>
                                    <iframe src="{{ url($document->diplome) }}" width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4">
                                <h6 class="mx-3 my-2">Relvés</h6>
                            </div>
                            <div class="card-body p-3">
                                <button class="toggle-button">Show More</button>
                                <div class="toggle-div" style="display: none;">
                                    <a href="{{ url($document->relves) }}" target="_blank">View PDF</a>
                                    <iframe src="{{ url($document->relves) }}" width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4">
                                <h6 class="mx-3 my-2">Demande</h6>
                            </div>
                            <div class="card-body p-3">
                                <button class="toggle-button">Show More</button>
                                <div class="toggle-div" style="display: none;">
                                    <a href="{{ url($document->demande) }}" target="_blank">View PDF</a>
                                    <iframe src="{{ url($document->demande) }}" width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".toggle-button").click(function() {
            var toggleDiv = $(this).next(".toggle-div");
            toggleDiv.toggle();

            if ($(this).text() == "Show More") {
                $(this).text("Show Less");
            } else {
                $(this).text("Show More");
            }

            toggleDiv.find(".toggle-button").toggle();
        });
    });
</script>
<script>
    function showImage(src) {
    swal({
        content: {
        element: "img",
        attributes: {
            src: src,
            class: "w-100 border-radius-lg shadow-sm",
            onload: "this.style.width='100%'",
            style: "width: auto; max-width: 100%; height: auto;"
        }
        }
    });
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection