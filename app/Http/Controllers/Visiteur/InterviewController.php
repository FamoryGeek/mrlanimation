<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Interview;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Content::where('type_content_id',1)->latest()->paginate(9);

        return Inertia::render('Interviews/Index', [
            'interviews' => $interviews
        ]);
    }

    public function show($slug)
    {
        $interview = Interview::where('slug', $slug)->firstOrFail();

        return Inertia::render('Interviews/Show', [
            'interview' => $interview
        ]);
    }
}
