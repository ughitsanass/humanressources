@php
    $accessControlCandidat = \Illuminate\Support\Facades\Auth::user();
@endphp


<x-app-layout>




    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
            <div class="bg-white border rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-blue-600"><i class="fa fa-list fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    @php
                        $totalrevenue = DB::table('users')->count();
                        $totalusers = DB::table('users')->count();



                    $mescandidatures = DB::table('candidature')
                    ->join('candidats', 'candidature.id_candidat', '=', 'candidats.id')
                    ->join('offres','candidature.id_offre',"=",'offres.id')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->select('*')
                    ->count();

                    $mescandidaturesget = DB::table('candidature')
                    ->join('candidats', 'candidature.id_candidat', '=', 'candidats.id')
                    ->join('offres','candidature.id_offre',"=",'offres.id')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->id)
                    ->select('*')
                    ->get();

                    $mescandidaturestrue = DB::table('candidature')
                    ->join('candidats', 'candidature.id_candidat', '=', 'candidats.id')
                    ->join('offres','candidature.id_offre',"=",'offres.id')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->where('statut', true)
                    ->select('*')
                    ->count();

                    $mescandidaturesfalse = DB::table('candidature')
                    ->join('candidats', 'candidature.id_candidat', '=', 'candidats.id')
                    ->join('offres','candidature.id_offre',"=",'offres.id')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->where('statut',false)
                    ->select('*')
                    ->count();
                    @endphp
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-500">Mes Candidatures</h5>

                        <h3 class="font-bold text-3xl"> {{$mescandidatures }}</h3>
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
                        <div class="rounded p-3 bg-green-600"><i class="fas fa-check fa-2x fa-fw fa-check"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-500">Accepté</h5>
                        <h3 class="font-bold text-3xl"> {{$mescandidaturestrue}}</h3>
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
                        <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-minus fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-gray-500">refusé</h5>
                        <h3 class="font-bold text-3xl">{{$mescandidaturesfalse}} </h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>








        </div>


    <br><br>
    <h2> {{\Illuminate\Support\Facades\Auth::user()->name}}, vous avez candidaté à {{$mescandidatures}} Offres</h2>
    <div class="w-1/2 ">

        {{$mescandidaturesget}}
        <!--Metric Card-->
        @foreach($mescandidaturesget as $candidature)
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Candidature n°: {{$candidature->id_offre}}</h5>
                    <h3 class="font-bold text-3xl"> </h3>
                </div>
            </div>
        </div>
    @endforeach
        <!--/Metric Card-->
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

