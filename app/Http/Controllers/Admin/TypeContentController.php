<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\TypeContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeContentController extends Controller
{
    public function index(){
        $types = TypeContent::all();
        return view("admin.type-content.show", compact("types"));
    }

    public function save(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            TypeContent::create([
                'name' => $request->name,
            ]);
            flash()->success('Type de contenu créé avec succès.');
            return redirect()->route('admin.types-content');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la création du type de contenu : ' . $e->getMessage());
            return back();
        }
    }


    public function update(Request $request, $id){
        try {
            // Validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Récupérer et mettre à jour le type d'abonnement
            $type_content = TypeContent::findOrFail($id);
            $type_content->name = $request->name;
            $type_content->save();

            flash()->success( 'Type de contenu mis à jour avec succès.');
            return redirect()->route('admin.types-content');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la mise à jour du type de contenu : '. $e->getMessage());
            return back();
        }
    }
    public function delete($id){
        try {
            // Trouver le type d'abonnement par son ID
            $type_content = TypeContent::findOrFail($id);

            // Supprimer l'abonnement
            $type_content->delete();

            // Rediriger avec un message de succès
            flash()->success('Type de contenu supprimé avec succès.');
            return redirect()->route('admin.types-content');

        } catch (Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            flash()->error('Erreur lors de la suppression du type de contenu : '. $e->getMessage());
            return redirect()->route('admin.types-content');
        }
    }


}
