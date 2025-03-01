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
            return redirect()->route('visiteur.dashboard');
        }
        return toastr()->error('Identifiants incorrects.');
    }

    public function logout()
    {
        Auth::guard('visiteur')->logout();
        return redirect()->url('/');
    }
}
