@include('header')
    <!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Examiner la candidature n°{{$candidature}}</title>
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

    //recuperer les informations du candidat

$candidats = DB::table('candidatures')
    ->join('users','users.id',"=",'candidatures.id_candidat')
    ->join('candidats','users.id',"=",'candidats.id_utilisateur')
    ->select('users.name as name','users.email as email','users.numtel as tel','candidats.diplome','candidatures.statut')
    ->where('candidatures.id','=',$candidature)
    ->get();
foreach ($candidats as $candidat) {
}




    $question = DB::table('offres')
    ->join('candidatures','offres.id',"=",'candidatures.id_offre')
    ->where('candidatures.id','=',$candidature)
    ->get();
    foreach($question as $qst)


@endphp

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">

            <div class="p-3 py-5">

                <div class="d-flex justify-content-between align-items-center">

                </div>




                    @csrf
<div style="margin-bottom: 10em">
                <h5 class="text-right">Informations sur le candidat :</h5><br>
                <br>

                <p style="width: 50%; float: left; font-weight: bold">Nom et prénom : </p> <input type="text" style="width: 50%; float: right" placeholder="{{$candidat->name}}" disabled readonly>
    <br><br>
                <p style="width: 50%; float: left ; font-weight: bold">email : </p> <input type="text" style="width: 50%; float: right" placeholder="{{$candidat->email}}" disabled readonly>
    <br><br>
                <p style="width: 50%; float: left ; font-weight: bold">tel : </p> <input type="text" style="width: 50%; float: right" placeholder="{{$candidat->tel}}" disabled readonly>
    <br><br>
                <p style="width: 50%; float: left ; font-weight: bold">diplôme : </p> <input type="text" style="width: 50%; float: right" placeholder="{{$candidat->diplome}}" disabled readonly>

</div>
                <br><br>
                <h5 class="text-right">Réponses aux questions : </h5><br>
                @if(isset($qst->q1))
                    <div style="width: 50%; float: left"> {{$qst->q1}}</div>
                    <div style="width: 50%; float: right">

                        @if(isset($qst->r1))
                            <textarea disabled readonly>{{$qst->r1}}</textarea>
                            @else
                            <textarea disabled readonly>Aucune réponse</textarea>
                            @endif</textarea>

                    </div>

<br><br><br>
                @endif


                @if(isset($qst->q2))
                    <div style="width: 50%; float: left"> {{$qst->q2}}</div>
                    <div style="width: 50%; float: right">

                        @if(isset($qst->r2))
                            <textarea disabled readonly>{{$qst->r2}}</textarea>
                        @else
                            <textarea disabled readonly>Aucune réponse</textarea>
                            @endif</textarea>

                    </div>

                    <br><br><br>@endif


                @if(isset($qst->q3))
                    <div style="width: 50%; float: left"> {{$qst->q3}}</div>
                    <div style="width: 50%; float: right">

                        @if(isset($qst->r3))
                            <textarea disabled readonly>{{$qst->r3}}</textarea>
                        @else
                            <textarea disabled readonly>Aucune réponse</textarea>
                            @endif</textarea>

                    </div><br><br><br>
                @endif



                @if(isset($qst->q4))
                    <div style="width: 50%; float: left"> {{$qst->q4}}</div>
                    <div style="width: 50%; float: right">

                        @if(isset($qst->r4))
                            <textarea disabled readonly>{{$qst->r4}}</textarea>
                        @else
                            <textarea disabled readonly>Aucune réponse</textarea>
                            @endif</textarea>

                    </div>

                    <br><br><br>@endif

                @if(isset($qst->q5))
                    <div style="width: 50%; float: left"> {{$qst->q5}}</div>
                    <div style="width: 50%; float: right">

                        @if(isset($qst->r5))
                            <textarea disabled readonly>{{$qst->r5}}</textarea>
                        @else
                            <textarea disabled readonly>Aucune réponse</textarea>
                            @endif</textarea>

                    </div>

<br><br><br>@endif
                    <div class="field">
                        <div class="control">
                            <div style="margin-top: 2em">

                                @php
                                $rappel="";
                                if ($candidat->statut == 1){
                                    $rappel="vous avez accepté cette candidature";
                                    $color2 ="green";
                                }elseif ($candidat->statut == 0){
                                    $rappel="vous avez refusé cette candidature";
                                    $color2 ="red";
                                }elseif ($candidat->statut == 2){
                                    $rappel="cette candidature est en attente";
                                    $color2 ="gold";
                                }
                                @endphp




                                <blockquote style="color: {{$color2}}">{{$rappel}}</blockquote>

                                @if($candidat->statut !== 1)
                                    <button class="btn btn-success"  type="submit"><a  style="color: white" href="{{route('candidatures.accepter',$candidature)}}">Accepter</a></button>
                                    @endif

                                    <button class="btn btn-warning"  type="submit"><a  style="color: white" href="{{route('candidatures.attente',$candidature)}}">Garder en attente</a></button>

                                @if ($candidat->statut !== 0)
                                <button class="btn btn-danger"  type="submit"><a  style="color: white" href="{{route('candidatures.refuser',$candidature)}}">Refuser</a></button>
                                @endif
                                    <br><br>
                                <a class="button is-info" href="{{ route('candidatures.index') }}">Retour à la liste</a>
                            </div>
                        </div>
                    </div>

            </div>

        </div>

    </div>
</div>
</div>

</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
















