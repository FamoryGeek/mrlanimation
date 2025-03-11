<?php

namespace App\Http\Controllers\Visiteur;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index(){
        return view('visiteur.profil');
    }

    // Mise à jour des informations du profil
    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ]);

            $user = Auth::guard('visiteur')->user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if (!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();
            toastr()->success( 'Profil mis à jour avec succès.');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error( 'Une erreur est survenue lors de la mise à jour du profil.');
            return redirect()->back();
        }
    }

     // Mise à jour de l'avatar
     public function updateAvatar(Request $request)
     {
         try {
             $request->validate([
                 'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             ]);

             $user = Auth::guard('visiteur')->user();

             if ($request->hasFile('photo')) {
                 // Supprimer l'ancien avatar s'il existe
                 if ($user->avatar) {
                     Storage::delete($user->avatar);
                 }

                 // Sauvegarde du nouveau fichier
                 $path = $request->file('photo')->store('visiteur/avatars', 'public');
                 $user->avatar = $path;
                 $user->save();
             }
             toastr()->success('Avatar mis à jour avec succès.');
             return redirect()->back();
         } catch (Exception $e) {
            toastr()->error( 'Une erreur est survenue lors de la mise à jour de l\'avatar.');
             return redirect()->back();
         }
     }
}
