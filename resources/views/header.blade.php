@php
$auth = \Illuminate\Support\Facades\Auth::user();
if (isset($auth)){
    $statut = \Illuminate\Support\Facades\Auth::user()->statut;
$redirect = "";
if($statut == 0){
    $redirect = \App\Providers\RouteServiceProvider::CANDIDAT;
}elseif($statut == 1){
    $redirect = \App\Providers\RouteServiceProvider::RECRUTEUR;
}
}else{
    $redirect= route('login');
}



@endphp
<a style="float: right ; margin-top: 0" href="{{$redirect}}">Retour au Dashboard</a>
