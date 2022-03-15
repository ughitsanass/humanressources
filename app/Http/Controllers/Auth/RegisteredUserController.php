<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Recruteur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'statut'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'statut'=> $request->statut,
        ]);


        if ($user['statut']==0){

            $candidat = Candidat::create([
                'id_utilisateur' => $user['id'],
            ]);

        }else{
            $recruteur = Recruteur::create([
                'id_utilisateur' => $user['id'],
            ]);
        }

        event(new Registered($user));
        Auth::login($user);




        Auth::user()->getAuthIdentifierName();
        if ($user['statut']==0){
            return redirect(RouteServiceProvider::CANDIDAT);
        }elseif ($user['statut']==1){
            return redirect(RouteServiceProvider::RECRUTEUR);
        }

    }
}
