@include('header')
<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Offre n° {{$offre->id}}</title>
</head>
<body>


<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>



@php
$auth = \Illuminate\Support\Facades\Auth::user();
@endphp

@if(isset($auth))
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                         width="150px"
                                                                                         src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                    class="font-weight-bold"></span><span
                    class="text-black-50"></span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Détails sur l'offre {{$offre->id}}</h4>
                </div>


                <div class="row mt-2">
                    <div class="col-md-12²">Intitulé de l'offre : {{$offre->id}}</div>
                </div>
@php
                $recruteur = DB::table('offres')
                ->join('users','offres.id_recruteur',"=",'users.id')
                ->where('users.id','=',$offre->id_recruteur)
                ->get();
                foreach($recruteur as $therecruteur){}

                @endphp
                <div class="row mt-2">
                    <div class="col-md-12²">Recruteur : {{$therecruteur->name}}</div>
                </div>


                <div class="row mt-2">
                    <div class="col-md-12²">Diplôme requis : {{$offre->diplome_requis}}</div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12²">Rémunération : {{$offre->remuneration}} Euros.</div>
                </div>

<br><br>

                @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
                    @php

                        $candidatures = DB::table('candidatures')
                                        ->select('id_offre', 'id_candidat')
                                        ->where('id_offre',$offre->id)
                                        ->where('id_candidat',\Illuminate\Support\Facades\Auth::id())
                                        ->get();
                    @endphp

                    @if(count($candidatures)==0)
                        <a href="{{ route('candidater', $offre->id) }}" class="card-link">Candidater</a>
                    @else
                        Vous avez déja candidaté à cette offre !
                        <a href="/candidatures" class="card-link">Ma Candidature</a>
                    @endif

                    <a href="{{\App\Providers\RouteServiceProvider::offres}}" class="card-link">Retour</a>
                @endif
            </div>
        </div>

    </div>
</div>
</div>
</div>

@else
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                             width="150px"
                                                                                             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold"></span><span
                        class="text-black-50"></span><span> </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Détails sur l'offre {{$offre->id}}</h4>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-12²">Intitulé de l'offre : {{$offre->id}}</div>
                    </div>
                    @php
                        $recruteur = DB::table('offres')
                        ->join('users','offres.id_recruteur',"=",'users.id')
                        ->where('users.id','=',$offre->id_recruteur)
                        ->get();
                        foreach($recruteur as $therecruteur){}

                    @endphp
                    <div class="row mt-2">
                        <div class="col-md-12²">Recruteur : {{$therecruteur->name}}</div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-12²">Diplôme requis : {{$offre->diplome_requis}}</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12²">Rémunération : {{$offre->remuneration}} Euros.</div>
                    </div>

                    <br><br>


                    <a href="{{\App\Providers\RouteServiceProvider::offres}}" class="card-link">Retour</a>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    @endif

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>



