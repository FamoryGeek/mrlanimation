<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeSubscription;
use Illuminate\Http\Request;
use Exception;

class TypeSubscriptionController extends Controller
{
    public function index(){
        $type_subscriptions = TypeSubscription::all();
        return view('admin.type-subscription.show',compact('type_subscriptions'));
    }



    public function save(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            TypeSubscription::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);
            flash()->success('Type d\'abonnement créé avec succès.');
            return redirect()->route('admin.types-subscription.show');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la création du type d\'abonnement : ' . $e->getMessage());
            return back();
        }
    }

    
    public function update(Request $request, $id){
        try {
            // Validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
            ]);

            // Récupérer et mettre à jour le type d'abonnement
            $subscriptionType = TypeSubscription::findOrFail($id);
            $subscriptionType->name = $request->name;
            $subscriptionType->price = $request->price;
            $subscriptionType->save();

            flash()->success( 'Type d\'abonnement mis à jour avec succès.');
            return redirect()->route('admin.types-subscription.show');
        } catch (Exception $e) {
            flash()->error( 'Erreur lors de la mise à jour du type d\'abonnement : '. $e->getMessage());
            return back();
        }
    }

    public function delete($id){
        try {
            // Trouver le type d'abonnement par son ID
            $subscriptionType = TypeSubscription::findOrFail($id);

            // Supprimer l'abonnement
            $subscriptionType->delete();

            // Rediriger avec un message de succès
            flash()->success('Type d\'abonnement supprimé avec succès.');
            return redirect()->route('admin.types-subscription.show');

        } catch (Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            flash()->error('Erreur lors de la suppression du type d\'abonnement : '. $e->getMessage());
            return redirect()->route('admin.types-subscription.show');
        }
    }
}
