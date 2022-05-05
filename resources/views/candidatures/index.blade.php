

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="card-body col-4">

    <?php
    foreach($candidatures as $candidature){


            $offres = DB::table('offres')
                ->join('candidatures', 'candidatures.id_offre', '=', 'offres.id')
                ->where('candidatures.id', '=', $candidature->id)
                ->select('*')
                ->get();


    foreach ($offres as $offre) {}
    ?>

    <div style="margin-bottom: 1em ; background-color: lightgrey; border-radius: 12px ; width: 110%; height: 110%">

        <div style="text-align: center ; align-self: center">
            <h5 class="card-title">id : {{$candidature->id}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Candidat : {{$candidature->id_candidat}}</h6>
            <p class="card-text">Offre : {{$offre->type}}</p>
            <!-- ajouter les liens vers la page de l'offre -->

            @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
                <form action="{{ route('candidatures.destroy', $candidature->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-primary">Annuler ma candidature</button>
                </form>
            @endif




        </div>


    </div>
<?php } ?>


