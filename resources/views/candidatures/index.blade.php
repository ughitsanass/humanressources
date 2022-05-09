<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


@if(count($candidatures)==0)
    vous n'avez aucune candidature en cours ! <br>
   <a href="{{\App\Providers\RouteServiceProvider::offres}}">Vérifiez les offres disponibles</a>
    @else

<div class="card-body col-4">

    <?php
    foreach($candidatures as $candidature){


            $offres = DB::table('offres')
                ->join('candidatures', 'candidatures.id_offre', '=', 'offres.id')
                ->where('candidatures.id', '=', $candidature->id)
                ->select('*')
                ->get();

    $entreprise = DB::table('candidatures')
        ->join('offres','offres.id',"=",'candidatures.id_offre')
        ->join('entreprise','offres.id_entreprise',"=","entreprise.id")
        ->where('offres.id','=',$candidature->id_offre)
        ->get();
    foreach($entreprise as $theentreprise){}

    foreach ($offres as $offre) {}
    ?>

    <div style="margin-bottom: 1em ; background-color: lightgrey; border-radius: 12px ; width: 110%; height: 110%">



        <div style="text-align: center ; align-self: center">
            <h5 class="card-title">offre : {{$offre->type}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$theentreprise->nom_entreprise}}</h6>
            <!-- ajouter les liens vers la page de l'offre -->
<div style="height: 4em ; margin-top : 25px">
            @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
                <form action="{{ route('candidatures.destroy', $candidature->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button style="float: left" type="submit" class="btn btn-primary">Annuler ma candidature</button>
                </form>
<a href="offres/{{$candidature->id_offre}}"><button style="float: right" class="btn btn-primary">Détails offre</button></a>

            @endif
</div>



        </div>


    </div>
<?php }
    ?>

@endif
