<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Visiteur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_videos = Content::where('type_content_id', 1)->count();
        $total_articles = Content::where('type_content_id', 2)->count();
        $total_podcasts = Content::where('type_content_id', 3)->count();
        $total_musiques = Content::where('type_content_id', 4)->count();
        $total_formations = Content::where('type_content_id',5)->count();
        $total_visiteurs = Visiteur::where('status',1)->count();
        return view('admin.dashboard', compact('total_videos','total_articles','total_podcasts','total_musiques','total_formations','total_visiteurs'));
    }
}
