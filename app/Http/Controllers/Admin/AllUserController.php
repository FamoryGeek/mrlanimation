<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function adminUsers(){
        $users = User::all();
        return view('admin.all-user.admin', compact('users'));
    }
    public function adminUserSave(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8', // Minimum 8 caractères
                    'confirmed', // Vérifie la correspondance avec password_confirmation
                    'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
                ],
            ], [
                'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial (@$!%*?&).',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => false
            ]);
            flash()->success( 'Utilisateur enregistré avec succès.');
            return redirect()->route('admin.user');
        } catch (Exception $e) {
            flash()->error( 'error : '. $e->getMessage() );
            return redirect()->route('admin.user');
        }
    }

    public function adminUserUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'status' => 'sometimes|boolean',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'status' => $request->has('status'),
            ]);

            return redirect()->route('admin.user')->with('success', 'Utilisateur mis à jour avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }
    public function adminUserDelete($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.user')->with('success', 'Utilisateur supprimé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
    public function visiteurUsers(){
        $visiteurs = Visiteur::all();
        return view('admin.all-user.visiteur', compact('visiteurs'));
    }

    public function lock($id){
       try {
        $visiteur = Visiteur::find($id);
        $visiteur->status = 0;
        $visiteur->save();
        flash()->success('Visiteur bloqué avec succès');
        return redirect()->back();
       } catch (Exception $e) {
        flash()->error('Erreur lors du blocage du visiteur: '.$e->getMessage());
        return redirect()->back();
       }
    }
    public function unlock($id){
        try {
            $visiteur = Visiteur::find($id);
            $visiteur->status = 1;
            $visiteur->save();
            flash()->success('Visiteur debloqué avec succès');
            return redirect()->back();
           } catch (Exception $e) {
            flash()->error('Erreur lors du deblocage du visiteur: '.$e->getMessage());
            return redirect()->back();
           }
    }
}
