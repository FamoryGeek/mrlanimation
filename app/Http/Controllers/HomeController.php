<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function interview()
    {
        return view('interviews');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function term()
    {
        return view('terms');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function formation()
    {
        return view('formations');
    }

    public function musique()
    {
        return view('musiques');
    }

    public function podcast()
    {
        return view('podcasts');
    }

}
