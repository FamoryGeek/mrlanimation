<?php

namespace App\Http\Controllers\Visiteur\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View{
        return view("visiteur.auth.login");
    }

    public function login(Request $request){

         // Valider les données du formulaire
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);



        if (Auth::guard('visiteur')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('visiteur')->user();
            toastr()->success("Bienvenue, {$user->name} ! Heureux de vous revoir.");
            return redirect()->route('visiteur.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    public function logout()
    {
        Auth::guard('visiteur')->logout();
        flash()->success('Vous avez bien été déconnecté.');
        return redirect()->route('home');
    }
}
