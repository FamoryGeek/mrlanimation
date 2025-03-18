<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view("admin.categorie.show", compact("categories"));
    }

    public function save(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
            ]);

            Categorie::create([
                'name' => $request->name,
                'description'=> $request->description,
                'slug' => Str::slug($request->name)
            ]);
            flash()->success('Categorie créé avec succès.');
            return redirect()->route('admin.categorie');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la création de la Categorie : ' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id){
        try {
            // Validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',

            ]);

            // Récupérer et mettre
            $categorie = Categorie::findOrFail($id);
            $categorie->name = $request->name;
            $categorie->description = $request->description;
            $categorie->slug = Str::slug($request->name);
            $categorie->save();

            flash()->success( 'Categorie mis à jour avec succès.');
            return redirect()->route('admin.categorie');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la mise à jour de la categorie : '. $e->getMessage());
            return back();
        }
    }

    public function delete($id){
        try {
            // Trouver la categorie par son ID
            $categorie = Categorie::findOrFail($id);

            // Supprimer la categorie
            $categorie->delete();

            // Rediriger avec un message de succès
            flash()->success('Categorie supprimé avec succès.');
            return redirect()->route('admin.categorie');

        } catch (Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            flash()->error('Erreur lors de la suppression de la categorie : '. $e->getMessage());
            return redirect()->route('admin.categorie');
        }
    }

}
