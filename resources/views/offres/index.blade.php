<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<h1> Liste des Offres </h1>
<div class="card-body col-4">


    @foreach ($offres as $offre)
        @php
            // chopper le nom du recruteur correspondant
                            $recruteur = DB::table('offres')
                                ->join('users','offres.id_recruteur',"=",'users.id')
                                ->where('users.id','=',$offre->id_recruteur)
                                ->get();
                            // instanciation du recruteur
                            foreach($recruteur as $therecruteur){}


            // chopper le nom de l'entreprise correspondante
// instanciation de l'entreprise
                            $entreprise = DB::table('offres')
                                ->join('entreprise','offres.id_entreprise',"=",'entreprise.id')
                                ->where('entreprise.id','=',$offre->id_entreprise)
                                ->get();
                            foreach($entreprise as $theentreprise){}

        // vérification de l'offre pour la partie candidater , qui ne sera permise que lorsque le candidat n'as jamais candidaté à cette offre.

        @endphp


        <div style="margin-bottom: 1em ; background-color: lightgrey; border-radius: 12px ; width: 110%; height: 110%">


            <div style="text-align: center ; align-self: center">
                <h5 class="card-title"> <a style="color: darkolivegreen" href="offres/{{$offre->id}}"> {{$offre->type}} </a></h5>
                <h6 class="card-subtitle mb-2 text-muted">Entreprise : {{$theentreprise->nom_entreprise}}</h6>
                <br>
                <a href="{{ route('offres.show', $offre->id) }}" class="card-link">Consulter</a> <br>

                @if(\Illuminate\Support\Facades\Auth::user()->statut !== 0)
                    <a href="{{ route('offres.edit', $offre->id) }}" class="card-link">Modifier</a>
                @endif



                @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
                    @php
// liste de candidatures + verification de si le candidat à déja candidaté
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
                        <a href="candidatures" class="card-link">Ma Candidature</a>
                    @endif
                @endif


            </div>


        </div>


@endforeach

<footer>
    @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
    <a href="{{\App\Providers\RouteServiceProvider::CANDIDAT}}"> Retour au portail Candidat</a>
    @else
        <a href="{{\App\Providers\RouteServiceProvider::RECRUTEUR}}"> Retour au portail Recruteur</a>
    @endif
</footer>
