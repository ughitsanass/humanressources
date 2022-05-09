<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Candidature;
use App\Models\Offre;

use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres=Offre::all();
        return view('offres.index',compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OffreRequest $request, Offre $offre)
    {
        $offre->id_recruteur=Auth::id();
        $offre->id_entreprise=2;
        $offre->type=$request->type;
        $offre->ville=$request->ville;
        $offre->diplome_requis=$request->diplome_requis;
        $offre->remuneration=$request->remuneration;
        $offre->q1=$request->q1;
        $offre->q2=$request->q2;
        $offre->q3=$request->q3;
        $offre->q4=$request->q4;
        $offre->q5=$request->q5;
        $offre->save();
        return redirect()->route('offres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view('offres.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OffreRequest $request, Offre $offre)
    {
        $offre->update($request->all());
        return redirect()->route('offres.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dossiercandidature($offre)
    {
        return view('offres.dossier', compact('offre'));
    }


    public function candidater($id , OffreRequest $request){
        Candidature::create([
            'id_offre' => $id,
            'id_candidat' => Auth::id(),
            'statut' => 2,
            'q1'=>$request->q1,
            'q2'=>$request->q2,
            'q3'=>$request->q3,
            'q4'=>$request->q4,
            'q5'=>$request->q5

        ]);
        return redirect()->route('offres.index')->with('candidature bien enregistrée');
    }

}
