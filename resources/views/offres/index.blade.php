<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des offres</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<nav>


</nav>


    <div class="card-body col-4">


        @php
                use Illuminate\Support\Facades\DB;$whoisrecruteur = DB::table('offres')
                    ->join('recruteurs', 'offres.id_recruteur', '=', 'recruteurs.id')
                    ->join('users','recruteurs.id_utilisateur',"=",'users.id')
                    ->join('entreprise', 'offres.id_entreprise',"=","entreprise.id")
                    ->select('*')
                    ->get();

        @endphp



@foreach ($whoisrecruteur as $item)
<br>
        <h5 class="card-title">Entreprise : {{$item->nom_entreprise}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Poste : {{$item->type}}</h6>
        <p class="card-text">Rémuneration : {{$item->remuneration}} Euros/an</p>

        @if(\Illuminate\Support\Facades\Auth::user()->statut == 0)
        <a href="#" class="card-link">Candidater</a>
            @endif
    <br>

</div>
@endforeach

