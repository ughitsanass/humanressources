@php
// id de l'utilisateur à partir de l'id recruteur :

use Illuminate\Support\Facades\DB;
$recruteur = \Illuminate\Support\Facades\Auth::user();

$whoisme = DB::table('recruteurs')
        ->join('users', 'recruteurs.id_utilisateur', '=', 'users.id')
        ->where('users.id',$recruteur)
        ->select('*')
        ->get();
foreach ($whoisme as $wim){
}


//verification recruteur pour les droits : si le recruteur
// && : opérateur et
// || : opérateur ou

$rights = false;
if ($recruteur->statut == 1 && $recruteur->id == $offre->id_recruteur){
    $rights = true;
}
echo $rights;


@endphp



@if($rights == true)
        <div class="card">
    <header class="card-header">
        <p class="card-header-title">Modifier le N° {{$offre->id}}</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('offres.update', $offre->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label class="label">Intitulé</label>
                    <div class="control">

                        <input id="type" type="text" name="type" value="{{ old('type',$offre->type)}}" required>
                    </div>

                </div>


                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('offres.index') }}">Retour</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    @endif
<!--
if(\Illuminate\Support\Facades\Auth::candidat()->id == $wim->id_utilisateur )

endif

-->
Vous n'êtes pas propriétaire de cette offre !
