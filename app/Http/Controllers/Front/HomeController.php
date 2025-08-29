<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home', ['theme' => session('theme', 'blue')]);
    }

    public function about()
    {
        return view('front.about', ['theme' => session('theme', 'blue')]);
    }

    public function contact()
    {
        return view('front.contact', ['theme' => session('theme', 'blue')]);
    }
}
