<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function send(Request $request)
    {
        $request->validate(['content' => 'required|string']);

        $subscribers = NewsletterSubscriber::where('is_active', true)->pluck('email');

        foreach ($subscribers as $email) {
            Mail::to($email)->send(new NewsletterMail($request->content));
        }

        return back()->with('success', 'Newsletter envoyée avec succès !');
    }

    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:newsletter_subscribers,email']);

        NewsletterSubscriber::create(['email' => $request->email]);

        return back()->with('success', 'Vous êtes maintenant abonné à la newsletter !');
    }
}
