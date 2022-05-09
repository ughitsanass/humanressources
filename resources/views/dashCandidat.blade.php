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



                    $mescandidatures = DB::table('candidatures')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->select('*')
                    ->count();

                    $mescandidaturestrue = DB::table('candidatures')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->where('statut',1)
                    ->select('*')
                    ->count();

                    $mescandidaturesfalse = DB::table('candidatures')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->where('statut',0)
                    ->select('*')
                    ->count();

                    $mescandidatureswait = DB::table('candidatures')
                    ->where('id_candidat',\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                    ->where('statut',2)
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
                        <h3 class="font-bold text-3xl"> {{$mescandidaturestrue}} / {{$mescandidatures }} </h3>
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
                        <h5 class="font-bold uppercase text-gray-500">En Attente</h5>
                        <h3 class="font-bold text-3xl">{{$mescandidatureswait}} / {{$mescandidatures }} </h3>
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
                        <h5 class="font-bold uppercase text-gray-500">Refusé</h5>
                        <h3 class="font-bold text-3xl">{{$mescandidaturesfalse}} / {{$mescandidatures }} </h3>
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

