<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Candidat - @php if($candidat->id == \Illuminate\Support\Facades\Auth::user()->id) { echo old('name',$candidat->name); }else{
    echo 'inconnu';
} @endphp</title>
</head>
<body>

@php
/** vérifier le bon utilisateur */
use App\Providers\RouteServiceProvider;use Illuminate\Support\Facades\DB;
var_dump($_POST);
$myid = \Illuminate\Support\Facades\Auth::user()->id;

if($candidat->id == $myid) {

$whoami = \Illuminate\Support\Facades\Auth::user()->statut;
$whoisme = DB::table('candidats')
        ->join('users', 'candidats.id_utilisateur', '=', 'users.id')
        ->where('users.id',$myid)
        ->select('users.id')
        ->get();


if ($whoami == 0){
    $whoisme = DB::table('candidats')
        ->join('users', 'candidats.id_utilisateur', '=', 'users.id')
        ->where('candidats.id_utilisateur',$myid)
        ->select('users.id')
        ->get();
}else{
   $whoisme = DB::table('recruteurs')
        ->join('users', 'recruteurs.id_utilisateur', '=', 'users.id')
        ->where('recruteurs.id_utilisateur',$myid)
        ->select('users.id')
        ->get();
}

foreach ($whoisme as $whoismeitem){
}



$diplomes = DB::table('candidats')
        ->join('users', 'candidats.id_utilisateur', '=', 'users.id')
        ->where('users.id',$whoismeitem->id)
        ->select('candidats.diplome')
        ->get();

$diploma="";
foreach ($diplomes as $diplome){}
$diploma = $diplome->diplome;

}else{
   return redirect(RouteServiceProvider::CANDIDAT);
}


@endphp
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

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                                                                                         width="150px"
                                                                                         src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                    class="font-weight-bold">{{old('name',$candidat->name)}}</span><span
                    class="text-black-50">{{old('name',$candidat->email)}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Editer le profil</h4>
                </div>

                <form method="POST" action="{{ route('candidat.update', $candidat->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nom et prénom</label><input type="text"
                                                                                                class="form-control"
                                                                                                placeholder="{{old('name',$candidat->name)}}"
                                                                                                value="{{old('name',$candidat->name)}}">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Numéro de tel</label><input type="text"
                                                                                                 class="form-control"
                                                                                                 placeholder="{{old('name',$candidat->numtel)}}"
                                                                                                 value="{{old('name',$candidat->numtel)}}">
                        </div>
                        <div class="col-md-12"><label class="labels">Addresse</label><input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="{{old('name',$candidat->adresse)}}" {{old('name',$candidat->adresse)}}>
                        </div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                                                                         class="form-control"
                                                                                         placeholder="{{old('name',$candidat->email)}}"
                                                                                         value="{{old('name',$candidat->email)}}">
                        </div>

                        @php
                            $statut = \Illuminate\Support\Facades\Auth::user()->statut;
                            if ($statut == 0){
                                $intitule = "Candidat";
                            }else{
                                $intitule = "Recruteur";
                            }
                        @endphp

                        <div class="col-md-12"><label class="labels">Statut</label><input type="text"
                                                                                          class="form-control"
                                                                                          placeholder="{{$intitule}}"
                                                                                          readonly></div>
                        <div class="col-md-12"><label class="labels">diplome</label><input type="text"
                                                                                           class="form-control"
                                                                                           placeholder="{{$diploma}}"
                                                                                           readonly></div>

                    </div>



                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Enregistrer</button>
                    </div>

                </form>
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


