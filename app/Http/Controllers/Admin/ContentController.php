<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Content;
use App\Models\Categorie;
use App\Models\TypeContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        $type_content = TypeContent::all();
        $categories = Categorie::all();
        return view("admin.content.show", compact("contents", "type_content","categories"));
    }


    public function save(Request $request)
    {
            /* dd(ini_get('post_max_size'), ini_get('upload_max_filesize'),phpinfo()) */;
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'type_content_id' => 'required|exists:type_contents,id',
                'categorie_id' => 'required|exists:categories,id',
                'cover' => 'nullable|image|mimes:jpg,png|max:5120',
                'file_path' => 'nullable|file|mimes:mp4,mp3,jpg,png,pdf|max:20480',
                'is_premium' => 'boolean',
            ]);
            // Définir le chemin du dossier en fonction du type
            $typeFolder = $this->getTypeFolder($request->type_content_id);

            // Stocker le fichier dans le dossier correspondant au type
            $filePath = $request->hasFile('file_path') ? $request->file('file_path')->store($typeFolder, 'public') : null;

            $coverPath = $request->hasFile('cover') ? $request->file('cover')->store('cover', 'public') : null;

            $content = Content::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'type_content_id' => $request->type_content_id,
                'categorie_id' => $request->categorie_id,
                'cover' => $coverPath,
                'file_path' => $filePath,
                'is_premium' => $request->is_premium ?? false,
                'is_published' => true
            ]);
            flash()->success('Contenu ajouté avec succès.');
            return redirect()->route('admin.contents');
        } catch (Exception $e) {
            flash()->error('Une erreur est survenue lors de l\'ajout du contenu : ' . $e->getMessage());
            return back();
        }
    }



    public function update(Request $request, $id)
    {
        try {
            /* dd($request->subscription_required); */
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'type_content_id' => 'required|exists:type_contents,id',
                'categorie_id' => 'required|exists:categories,id',
                'cover' => 'nullable|image|mimes:jpg,png|max:5120',
                'file_path' => 'nullable|file|mimes:mp4,mp3,jpg,png,pdf|max:20480',
                'is_premium' => 'boolean',
            ]);
            $content = Content::findOrFail($id);
            $typeFolder = $request->type_content_id;

            // Gérer l'upload du fichier principal
            if ($request->hasFile('file_path')) {
                // Supprimer l'ancien fichier s'il existe
                if ($content->file_path) {
                    Storage::disk('public')->delete($content->file_path);
                }
                // Sauvegarder le nouveau fichier
                $filePath = $request->file('file_path')->store($typeFolder, 'public');
            } else {
                $filePath = $content->file_path;
            }

            // Gérer l'upload de la cover
            if ($request->hasFile('cover')) {
                // Supprimer l'ancienne cover si elle existe
                if ($content->cover) {
                    Storage::disk('public')->delete($content->cover);
                }
                // Sauvegarder la nouvelle cover
                $coverPath = $request->file('cover')->store('cover', 'public');
            } else {
                $coverPath = $content->cover;
            }

            // Mettre à jour le contenu
            $content->update([
                'title' => $request->title,
                'description' => $request->description,
                'type_content_id' => $request->type_content_id,
                'categorie_id' => $request->categorie_id,
                'cover' => $coverPath,
                'file_path' => $filePath,
                'is_premium' => $request->is_premium ?? false,
                'is_published' => true
            ]);
            flash()->success('Contenu mis à jour avec succès.');
            return redirect()->route('admin.contents');
        } catch (Exception $e) {
            flash()->error('Une erreur est survenue lors de la mise à jour : ' . $e->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        try {
            // Trouver le type d'abonnement par son ID
            $content = Content::findOrFail($id);

            if ($content->file_path) {
                Storage::disk('public')->delete($content->file_path);
            }
            if ($content->cover) {
                Storage::disk('public')->delete($content->cover);
            }
            // Supprimer l'abonnement
            $content->delete();

            // Rediriger avec un message de succès
            flash()->success('Contenu supprimé avec succès.');
            return redirect()->route('admin.contents');
        } catch (Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            flash()->error('Erreur lors de la suppression du Contenu : ' . $e->getMessage());
            return redirect()->route('admin.contents');
        }
    }

    protected function getTypeFoldeR($type_content_id)
    {
        // Retourner le dossier correspondant au type
        switch ($type_content_id) {
            case 1:
                return 'contents/videos';
            case 2:
                return 'contents/articles';
            case 3:
                return 'contents/podcasts';
            case 4:
                return 'contents/musique';
            case 5:
                return 'contents/formations';
            default:
                return 'contents/others';
        }
    }
}
