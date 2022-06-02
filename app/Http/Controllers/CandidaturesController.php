<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureRequest;
use App\Models\Candidat;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->statut == 0){
            $variable = 'id_candidat';
        }else{
            $variable = 'id_recruteur';
        }
            $candidatures = Candidature::all()->where($variable, Auth::id());
            return view('candidatures.index',compact('candidatures'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidature $candidature)
    {
        $candidature->delete();
        return redirect()->route('candidatures.index');
    }

    public function examiner($candidature){
        return view('candidatures.examiner', compact('candidature'));
    }

    public function accepterCandidature(CandidatureRequest $request, $candidature){
        $candidaturemodel = Candidature::find($candidature);
        $candidaturemodel->statut = $request->input('statut',1);
        $candidaturemodel->save();
        return redirect()->route('candidatures.index');
    }

    public function refuserCandidature(CandidatureRequest $request, $candidature){
        $candidaturemodel = Candidature::find($candidature);
        $candidaturemodel->statut = $request->input('statut',0);
        $candidaturemodel->save();
        return redirect()->route('candidatures.index');
    }

    public function attenteCandidature(CandidatureRequest $request, $candidature){
        $candidaturemodel = Candidature::find($candidature);
        $candidaturemodel->statut = $request->input('statut',2);
        $candidaturemodel->save();
        return redirect()->route('candidatures.index');
    }


}
