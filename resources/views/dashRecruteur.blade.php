@php

    $accessControlrecruteur = \Illuminate\Support\Facades\Auth::user();

    if ($accessControlrecruteur['statut'] !== 0 ){
        redirect(route('login'));
    }

  $nbtotalcandidatures = DB::table('candidatures')
    ->join('offres', 'candidatures.id_offre', '=', 'offres.id')
    ->join('recruteurs', 'offres.id_recruteur', '=', 'recruteurs.id_utilisateur')
    ->where('recruteurs.id_utilisateur',\Illuminate\Support\Facades\Auth::user()->id)
    ->select('*')
    ->count();

    $nbtotalcandidaturestrue = DB::table('candidatures')
    ->join('offres', 'candidatures.id_offre', '=', 'offres.id')
    ->join('recruteurs', 'offres.id_recruteur', '=', 'recruteurs.id_utilisateur')
    ->where('recruteurs.id_utilisateur',\Illuminate\Support\Facades\Auth::user()->id)
    ->where('candidatures.statut',1)
    ->select('*')
    ->count();

    $nbtotalcandidatureswait = DB::table('candidatures')
    ->join('offres', 'candidatures.id_offre', '=', 'offres.id')
    ->join('recruteurs', 'offres.id_recruteur', '=', 'recruteurs.id_utilisateur')
    ->where('recruteurs.id_utilisateur',\Illuminate\Support\Facades\Auth::user()->id)
    ->where('candidatures.statut',2)
    ->select('*')
    ->count();

    $nbtotalcandidaturesfalse = DB::table('candidatures')
    ->join('offres', 'candidatures.id_offre', '=', 'offres.id')
    ->join('recruteurs', 'offres.id_recruteur', '=', 'recruteurs.id_utilisateur')
    ->where('recruteurs.id_utilisateur',\Illuminate\Support\Facades\Auth::user()->id)
    ->where('candidatures.statut',0)
    ->select('*')
    ->count();




    $nboffres = DB::table('offres')
    ->where('offres.id_recruteur',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
    ->select('*')
    ->count();

@endphp




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portail recruteur') }}
        </h2>
    </x-slot>






    <div class="flex flex-wrap">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Nombre total de candidatures</h5>
                            <h3 class="font-bold text-3xl"> {{$nbtotalcandidatures}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-green-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">candidatures acceptés</h5>
                            <h3 class="font-bold text-3xl">{{$nbtotalcandidaturestrue}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-yellow-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">candidatures en attente</h5>
                            <h3 class="font-bold text-3xl">{{$nbtotalcandidatureswait}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-red-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">candidatures refusés</h5>
                            <h3 class="font-bold text-3xl">{{$nbtotalcandidaturesfalse}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>


            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <!--Metric Card-->
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-blue-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Nombre d'offres publiées</h5>
                            <h3 class="font-bold text-3xl"> {{$nboffres}}</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
        </div>
    </div>






</x-app-layout>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Day Admin Template: Tailwind Toolbox</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body>


</body>

</html>

